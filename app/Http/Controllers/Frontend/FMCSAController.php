<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\StaticCarrier;
use Illuminate\Http\Client\Pool;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class FMCSAController extends Controller
{
    public function searchCarrier(Request $request)
    {
        $carrierMcOrDot = ltrim($request->get('carrier_mc_or_dot', null), '0');
        try {
            $results = [];
            $webKey = config('services.fmcsa.web_key');
            $carrierUrl = sprintf('%s%s?webKey=%s', config('services.fmcsa.api_url'), sprintf('carriers/search/docket-number/%s', $carrierMcOrDot), $webKey);
            $dotUrl = sprintf('%s%s?webKey=%s', config('services.fmcsa.api_url'), sprintf('carriers/search/dot/%s', $carrierMcOrDot), $webKey);
            $responseDots = Http::pool(fn (Pool $pool) => [
                $pool->get($carrierUrl),
                $pool->get($dotUrl),
            ]);
            $carrierContents = [];
            $dotContents = [];
            if ($responseDots[0]->ok()) {
                $carrierContents = json_decode($responseDots[0]->body(), true)['content'];
                $carrierContents = array_map(function ($item) use ($carrierMcOrDot) {
                    $item['type'] = 'carrier_search';
                    $item['docket_number'] = $carrierMcOrDot;
                    return $item;
                }, $carrierContents);
            }
            
            if ($responseDots[1]->ok()) {
                $dotContents = json_decode($responseDots[1]->body(), true)['content'];
                $dotContents = array_map(function ($item) {
                    $item['type'] = 'dot_search';
                    $item['docket_number'] = '';
                    return $item;
                }, $dotContents);
            }
            $contents = array_merge($carrierContents, $dotContents);
            $contItems = count($contents);
            $responseDetails = Http::pool(function (Pool $pool) use ($contents, $webKey) {
                foreach ($contents as $content) {
                    $pool->get(sprintf('%s%s?webKey=%s', config('services.fmcsa.api_url'), sprintf('carriers/%s', $content['dotNumber']), $webKey));
                    $pool->get(sprintf('%s%s?webKey=%s', config('services.fmcsa.api_url'), sprintf('carriers/%s/docket-numbers', $content['dotNumber']), $webKey));
                }
                return $pool;
            });

            if ($contItems > 0) {
                $docketNumberSearchResults = [];
                $carrierDetailSearchResults = [];
                foreach ($responseDetails as $responseDetail) {
                    if ($responseDetail->ok()) {
                        $detailContent = json_decode($responseDetail->body(), true)['content'];
                        if (!empty($detailContent)) {
                            if (key_exists('carrier', $detailContent)) {
                                $carrierDetailSearchResults[] = $detailContent;
                            } else {
                                $docketNumberSearchResults[$detailContent[0]['dotNumber']] = array_pluck($detailContent, 'docketNumber');
                            }
                        }
                        
                    }
                }
                foreach ($carrierDetailSearchResults as $carrierDetailSearchResult) {
                    $dotNumber = $carrierDetailSearchResult['carrier']['dotNumber'];
                    $key = array_search($dotNumber, array_column($contents, 'dotNumber'));
                    $carrierDetailSearchResult['carrier']['docket_number'] = $contents[$key]['docket_number'];
                    foreach ($docketNumberSearchResults as $key => $docketNumberSearchResult) {
                        if ($key == $dotNumber) {
                            $carrierDetailSearchResult['carrier']['docket_number'] = implode(', ', $docketNumberSearchResult);
                            break;
                        }
                    }
                    $results[] = $carrierDetailSearchResult;
                } 
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
        }
        $finalResults = [];
        if (!empty($results)) {
            foreach($results as $result) {
                $staticCarrier = StaticCarrier::where('dot_number', $result['carrier']['dotNumber'])->first();
                if ($staticCarrier) {
                    $result['carrier']['mailing_street'] = $staticCarrier->mailing_street;
                    $result['carrier']['mailing_city'] = $staticCarrier->mailing_city;
                    $result['carrier']['mailing_state'] = $staticCarrier->mailing_state;
                    $result['carrier']['mailing_zip'] = $staticCarrier->mailing_zip;
                    $result['carrier']['mailing_country'] = $staticCarrier->mailing_country;
                    $result['carrier']['carrier_operation'] = $staticCarrier->carrier_operation;
                }
                
                $finalResults[] = $result;
            }
            return response()->json($finalResults, 200);
        } else {
            $staticCarrier = StaticCarrier::where('dot_number', $carrierMcOrDot)->first();
            if ($staticCarrier) {
                $finalResults[] = [
                    'carrier' => [
                        'docket_number' => '',
                        'dotNumber' => $carrierMcOrDot,
                        'legalName' => $staticCarrier->legal_name,
                        'dbaName' => $staticCarrier->dba_name,
                        'phyStreet' => $staticCarrier->phy_street,
                        'mailing_street' => $staticCarrier->mailing_street,
                        'mailing_city' => $staticCarrier->mailing_city,
                        'mailing_state' => $staticCarrier->mailing_state,
                        'mailing_zip' => $staticCarrier->mailing_zip,
                        'mailing_country' => $staticCarrier->mailing_country,
                        'carrier_operation' => $staticCarrier->carrier_operation,
                        'fromDatabase' => true,
                        'phyCity' => $staticCarrier->phy_city,
                        'phyState' => $staticCarrier->phy_state,
                        'phyCountry' => $staticCarrier->phy_country,
                        'phyZipcode' => $staticCarrier->phy_zip,
                        'telephone' => $staticCarrier->telephone,
                        'email_address' => $staticCarrier->email_address,
                    ],
                ];
                return response()->json($finalResults, 200);
            }
            return response()->json($results, 200);
        } 
        
    }

    public function showCarrier($dotNumber)
    {
        $webKey = config('services.fmcsa.web_key');
        $url = sprintf('%s%s?webKey=%s', config('services.fmcsa.api_url'), sprintf('carriers/%s', $dotNumber), $webKey);
        $response = Http::get($url);
        if ($response->ok()) {
            return response()->json(json_decode($response->body(), true)['content'], 200);
        } else {
            return response()->json([], 200);
        }
    }
}
