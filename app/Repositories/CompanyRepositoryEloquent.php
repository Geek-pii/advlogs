<?php

namespace App\Repositories;

use App\Helper\Helper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Company;
use Illuminate\Support\Facades\Http;
use App\Validators\CompanyValidator;
use App\Repositories\CompanyRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class CompanyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CompanyRepositoryEloquent extends BaseRepository implements CompanyRepository
{

    const IRS_TOKEN_CACHE_KEY = 'IRS-TOKEN';

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Company::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CompanyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable()
    {
        return $this->model->select('*')->with('accounts.roles')->orderBy('id', 'desc');
    }
    /**
     * @param $tinType ['SSN', 'EIN', 'UNKNOWN']
     * individual taxpayer TIN type
     * business taxpayer TIN type
     * individual or business taxpayer TIN type
     * @param $tin 
     * Numeric String value with exactly 9 characters
     * @param $name
     * Alphanumeric String value with a limit of up to 70 characters. 
     * The only special characters allowed are hyphen (“-“), ampersand (“&”), and space.
     */
    public function processTINMatch($tin, $name, $tinType = 'SSN')
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getIrsToken()
            ])->post(config('services.irs.api_url'). '/esrv/api/tinm/request', [
                'tin' => $tin,
                'name' => $name,
                'tinType' => $tinType
            ]);
            if ($response->ok()) {
                return $response->json();
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
            return false;
        }
    }


    public function getIrsToken()
    {
        $tokenExist = cache()->has(self::IRS_TOKEN_CACHE_KEY);
        $tokenArray = [];

        if ($tokenExist) {
            $tokenArray = json_decode(cache()->get(self::IRS_TOKEN_CACHE_KEY), true);
            $expired = $tokenArray['expired_at'];
            if ($expired < time()) {
                $tokenArray = $this->getNewIRSTokenFromApi($tokenArray['refresh_token']);
            }
            return $tokenArray['access_token'];
        } else {
            $tokenArray = $this->getIrsTokenFromApi();
            return $tokenArray['access_token'];
        }
    }

    public function getIrsTokenFromApi()
    {
        $key = file_get_contents(base_path('credentials/irs/private_key.pem'));
        $clientId   = config('services.irs.client_id');
        $userId = config('services.irs.api_user_id');

        $jwtUser = Helper::generateJWT($key, $clientId, $userId, config('services.irs.api_url'). '/auth/oauth/v2/token', null, null, Str::uuid()->toString());
        $jwtClient = Helper::generateJWT($key, $clientId, $clientId, config('services.irs.api_url'). '/auth/oauth/v2/token', null, null, Str::uuid()->toString());
        

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->get(config('services.irs.api_url'). '/auth/oauth/v2/token', [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwtUser,
            'client_assertion_type' => 'urn:ietf:params:oauth:client-assertion-type:jwt-bearer',
            'client_assertion' => $jwtClient
        ]);
        if ($response->ok()) {
            $result = json_decode($response->body(), true);
            $result['expired_at'] = time() + $result['expires_in'];
            cache()->forever(self::IRS_TOKEN_CACHE_KEY, json_encode($result));
            return $result;
        } else {
            throw new \Exception('IRS API Error');
        }
    }

    public function getNewIRSTokenFromApi($refreshToken)
    {
        $key = file_get_contents(base_path('credentials/irs/private_key.pem'));
        $clientId   = config('services.irs.client_id');
        $userId = config('services.irs.api_user_id');

        $jwtUser = Helper::generateJWT($key, $clientId, $userId, config('services.irs.api_url'). '/auth/oauth/v2/token', null, null, Str::uuid()->toString());
        $jwtClient = Helper::generateJWT($key, $clientId, $clientId, config('services.irs.api_url'). '/auth/oauth/v2/token', null, null, Str::uuid()->toString());
        

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->get(config('services.irs.api_url'). '/auth/oauth/v2/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_assertion_type' => 'urn:ietf:params:oauth:client-assertion-type:jwt-bearer',
            'client_assertion' => $jwtClient
        ]);
        if ($response->ok()) {
            $result = json_decode($response->body(), true);
            $result['expired_at'] = time() + $result['expires_in'];
            cache()->forever(self::IRS_TOKEN_CACHE_KEY, json_encode($result));
        } else {
            throw new \Exception('IRS Refresh Token API Error');
        }
    }
    
}
