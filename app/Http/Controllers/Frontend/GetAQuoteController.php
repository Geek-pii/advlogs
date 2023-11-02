<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Helper;
use App\Models\Message;
use App\Models\GetAQuote;
use App\Mail\RequestQuote;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Frontend\GetAQuoteCreateRequest;

class GetAQuoteController extends Controller
{
    public function getAQuote(GetAQuoteCreateRequest $request)
    {
        $input = $request->validated();
        if (isset($input['bind_account'])) {
            $authorizer = auth('account')->user();
            $authorizer->step_progress = 'quote_binded';
            $authorizer->save();
            $input['account_id'] = $authorizer->id;
        }

        if (isset($input['quote_id']) && $input['quote_id']) {
            $get_a_quote = GetAQuote::findOrFail($input['quote_id']);
        } else {
            $get_a_quote = GetAQuote::query()->create($input);
        }

        $get_a_quote->quote_number = Helper::uuidNumbers($get_a_quote->id);
        $get_a_quote->save();
        $msg = Message::first();
        return response()->json($msg, 200);
        // $data=collect();
        // $data->email=$request->email_address;
        // $data->first_name=$request->first_name;
        // $data->last_name=$request->last_name;
        // $data->phone_number=$request->phone_number;
        // $data->message= "You have received a new quote";
        // $data->year=$request->year;
        // $data->make=$request->make;
        // $data->model=$request->model;
        // $data->picking_zip=$request->picking_zip;
        // $data->delivery_zip=$request->delivery_zip;
        // $data->preferred_pick_up_date=$request->preferred_pick_up_date;
        // $data->condition=$request->condition;
        // $data->run_drives=$request->run_drives;
        // $data->rolls_steers_brakes=$request->rolls_steers_brakes;
        // $data->transport_type=$request->transport_type;
        // $data->transport_speed=$request->transport_speed;
        // $data->is_modifications=$request->is_modifications;
        // $data->modification_description=$request->modification_description;

        // Mail::to('akulubala@gmail.com')->send(new RequestQuote($data));

        // if($get_a_quote){
        //     $msg = Message::first();
        //     return response()->json($msg);
        // }
        // dd($get_a_quote);

        // return $get_a_quote ? $get_a_quote : restFail();
    }
}
