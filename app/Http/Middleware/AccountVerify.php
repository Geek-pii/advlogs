<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AccountVerify
{
    /**
     * Handle an incoming request for account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * personal account steps ['signed-up', 'account-confirmed', 'quote_binded', 'agreement_checked']
         */
        if (strtoupper(request()->method()) == 'GET' && auth('account')->check()) {
            $authorizer = auth('account')->user();
            $accountType = $authorizer->type;
            $routeName = Route::current()->getName();
            $passStep = $request->get('pass_step', false);
            if ($accountType == 'personal') {
                if ($authorizer->step_progress == 'signed-up') {
                    if ($routeName !== 'account.personal.quotes') {
                        return redirect()->route('account.personal.quotes');
                    }
                }
                if ($authorizer->step_progress == 'quote_binded') {
                    if (!$passStep) {
                        if ($routeName !== 'account.personal.agreement') {
                            return redirect()->route('account.personal.agreement');
                        }
                    }
                }
                if ($authorizer->step_progress == 'agreement_checked') {
                    if (!$passStep) {
                        if ($routeName !== 'account.pickup.information') {
                            return redirect()->route('account.pickup.information');
                        }
                    }
                }
                if ($authorizer->step_progress == 'filled_pickup_information') {
                    if (!$passStep) {
                        if ($routeName !== 'account.delivery.information') {
                            return redirect()->route('account.delivery.information');
                        }
                    }
                }
                if ($authorizer->step_progress == 'filled_delivery_information') {
                    if (!$passStep) {
                        if ($routeName !== 'user.dashboard') {
                            return redirect()->route('user.dashboard');
                        }
                    }
                }
            }
            if ($accountType == 'business') {
                if ($authorizer->account_step_number >= 1 && $authorizer->account_step_number < 5) {
                    if (!$passStep) {
                        if ($routeName !== 'account.biz.company-profile') {
                            return redirect()->route('account.biz.company-profile');
                        }
                    }
                }
                if ($authorizer->account_step_number == 5) {
                    if (!$passStep) {
                        if (auth('account')->user()->has_document_authority) {
                            if ($routeName !== 'account.biz.agreement') {
                                return redirect()->route('account.biz.agreement');
                            }
                        } else {
                            return redirect()->route('account.biz.billing');
                        }
                    }
                }
                if ($authorizer->account_step_number == 6) {
                    if (!$passStep) { 
                        if ($routeName !== 'account.biz.billing') {
                            return redirect()->route('account.biz.billing');
                        }
                    }
                }
                if ($authorizer->account_step_number == 7) {
                    if (!$passStep) {
                        if ($routeName !== 'user.dashboard') {
                            return redirect()->route('user.dashboard');
                        }
                    }
                }
            }
            if ($accountType == 'carrier') {
                if ($authorizer->account_step_number >= 1 && $authorizer->account_step_number < 5) {
                    if ($routeName !== 'account.carrier.company-profile') {
                        return redirect()->route('account.carrier.company-profile');
                    }
                }

                if ($authorizer->account_step_number == 5) {
                    if (!$passStep) {
                        if ($routeName !== 'account.carrier.agreement') {
                            return redirect()->route('account.carrier.agreement');
                        }
                    }
                }
                if ($authorizer->account_step_number >=6 && $authorizer->account_step_number < 9) {
                    if (!$passStep) {
                            if ($routeName !== 'account.carrier.load') {
                                return redirect()->route('account.carrier.load');
                            }
                    }
                }

                if ($authorizer->account_step_number >= 9 && $authorizer->account_step_number < 16) {
                    if (!$passStep) {
                        if ($routeName !== 'account.carrier.payment') {
                            return redirect()->route('account.carrier.payment');
                        }
                    }
                }
                
                if ($authorizer->account_step_number >= 16) {
                    if (!$passStep) {
                        if ($routeName !== 'user.dashboard') {
                            return redirect()->route('user.dashboard');
                        }
                    }
                }
            }
        }
        return $next($request);
    }
}
