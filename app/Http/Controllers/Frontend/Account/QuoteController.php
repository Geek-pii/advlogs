<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Models\GetAQuote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserQuoteRequest;

class QuoteController extends Controller
{
    public function bindUser(UserQuoteRequest $request)
    {
        $authorizer = auth('account')->user();
        $quote = GetAQuote::where('quote_number', $request->get('quote_number'))->first();
        $quote->account_id = $authorizer->id;
        $quote->save();
        $authorizer->step_progress = 'quote_binded';
        $authorizer->save();
        return response()->json($quote, 200);
    }
}
