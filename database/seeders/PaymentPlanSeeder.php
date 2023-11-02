<?php

namespace Database\Seeders;

use App\Models\PaymentPlan;
use Illuminate\Database\Seeder;

class PaymentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counts = PaymentPlan::count();
        if ($counts == 0) {
            $plans = [
                [
                    'use_factory' => 'N',
                    'pay_to' => null,
                    'days_paid' => 15,
                    'day_type' => 'Business',
                    'fee' => '0',
                    'offer_start' => '2022-02-15',
                    'offer_expiration' => null
                ],
                [
                    'use_factory' => 'Y',
                    'pay_to' => 'Factor',
                    'days_paid' => 15,
                    'day_type' => 'Business',
                    'fee' => '0',
                    'offer_start' => '2022-02-15',
                    'offer_expiration' => '2022-02-08'
                ],
                [
                    'use_factory' => 'N',
                    'pay_to' => null,
                    'days_paid' => 2,
                    'day_type' => 'Business',
                    'fee' => '5',
                    'offer_start' => '2022-02-15',
                    'offer_expiration' => null
                ],
                [
                    'use_factory' => 'Y',
                    'pay_to' => 'Direct',
                    'days_paid' => 2,
                    'day_type' => 'Business',
                    'fee' => '3',
                    'offer_start' => '2022-09-10',
                    'offer_expiration' => null
                ],
                [
                    'use_factory' => 'N',
                    'pay_to' => null,
                    'days_paid' => 5,
                    'day_type' => 'Business',
                    'fee' => '4',
                    'offer_start' => '2022-03-06',
                    'offer_expiration' => '2022-03-31'
                ],
                [
                    'use_factory' => 'Y',
                    'pay_to' => 'Factor',
                    'days_paid' => 30,
                    'day_type' => 'Calender',
                    'fee' => '0',
                    'offer_start' => '2022-08-02',
                    'offer_expiration' => null
                ],
                [
                    'use_factory' => 'Y',
                    'pay_to' => 'Direct',
                    'days_paid' => 5,
                    'day_type' => 'Calender',
                    'fee' => '1',
                    'offer_start' => '2022-07-25',
                    'offer_expiration' => '2022-12-31'
                ],
            ];
            foreach ($plans as $plan) {
                PaymentPlan::create($plan);
            }
        }
    }
}
