<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\PhoneValidationHistory;

class ToolsController extends Controller
{
    public function validatePhoneOrEmail(Request $request)
    {
        $newContact = $request->input('new_contact');
        if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $newContact)) {
            return response()->json(true);
        } else {
            $mobile =  "(".substr($newContact, 0, 3) .") " . substr($newContact, 3, 3) . "-" .substr($newContact, 6);
            $type = 'mobile_number';
            $apiResult = PhoneValidationHistory::where('phone_number', $mobile)->where('type', $type)->first();
            if ($apiResult) {
                return response()->json($apiResult->api_result, 200);
            }

            $apiResult = Helper::twilioValidPhoneNumber($mobile, $type);
            $phoneValidationHistory = new PhoneValidationHistory();
            $phoneValidationHistory->fill([
                'phone_number' => $mobile,
                'type' => $type,
                'api_result' => $apiResult
            ])->save();
            return response()->json($apiResult, 200);
        }

    }
}