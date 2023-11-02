<?php

namespace App\Observers;

use App\Models\Account;
use Illuminate\Support\Facades\Cache;

class AccountObserver
{
    /**
     * Handle the Account "created" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function created(Account $account)
    {
        $account->mobile_number_type = Cache::get('type_'.$account->mobile_number, null);
        $account->primary_contact_number_type = Cache::get('type_'.$account->primary_contact_number, null);
        $account->business_phone_number_type = Cache::get('type_'.$account->business_phone_number, null);
        $account->save();
    }

    /**
     * Handle the Account "updated" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function updated(Account $account)
    {
        if ($account->isDirty('has_document_authority')) {
            if (!$account->has_document_authority) {
                $company = $account->company;
                $company->agreement_checked = false;
                $company->agreement_checked_account_id = null;
                $company->agreement_checked_date = null;
                $company->save();
            }
        }
    }

    /**
     * Handle the Account "deleted" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function deleted(Account $account)
    {
        //
    }

    /**
     * Handle the Account "restored" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function restored(Account $account)
    {
        //
    }

    /**
     * Handle the Account "force deleted" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function forceDeleted(Account $account)
    {
        //
    }
}
