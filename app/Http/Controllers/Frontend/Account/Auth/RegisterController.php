<?php

namespace App\Http\Controllers\Frontend\Account\Auth;

use App\Models\System;
use App\Models\TinApiCallHistory;
use Carbon\Carbon;
use App\Models\Info;
use App\Models\Page;
use App\Models\Role;
use App\Helper\Helper;
use App\Models\Account;
use App\Models\Address;
use App\Models\GetAQuote;
use App\Models\CarrierLoad;
use App\Models\PaymentPlan;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Frontend\SignUpRequest;
use App\Repositories\CompanyRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Frontend\UserQuoteRequest;
use App\Http\Requests\Frontend\GetAQuoteCreateRequest;
use App\Repositories\PaymentPlanRepository;
use App\Jobs\SendEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $CompanyRepository;
    protected $paymentPlanRepository;

    public function __construct(CompanyRepository $repository, PaymentPlanRepository $paymentPlanRepository)
    {
        $this->CompanyRepository = $repository;
        $this->paymentPlanRepository = $paymentPlanRepository;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(SignUpRequest $request)
    {
        $account = $this->create($request->all());
        event(new Registered($account));

        auth()->guard('account')->login($account);
        if ($response = $this->registered($request, $account)) {
            return $response;
        }
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect()->route('account.sign-up.confirm');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\Sideline|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    protected function create(array $data)
    {
        return Account::query()->create(
            [
                "type" => $data['type'],
                "mobile_number" => $data['mobile_number'],
                "email" => $data['email'],
                "password" => bcrypt($data['password']),
                "first_name" => $data['first_name'],
                "last_name" => $data['last_name'],
                "primary_contact_number" => $data['primary_contact_number'],
                "job_title" => $data['job_title'],
                "business_phone_number" => $data['business_phone_number'],
                "business_phone_ext" => $data['business_phone_ext']
            ]
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(): \Illuminate\Contracts\Auth\StatefulGuard
    {
        return Auth::guard('account');
    }



    public function confirmSignUp()
    {
        return view('themes.sign_up.sign-up-confirmation');
    }

    public function personalQuotes()
    {
        $info = Info::first();
        $authorizer = $this->guard('account')->user();
        $quote = $authorizer->personalQuote;
        return view('themes.sign_up.personal.personal-quotes', compact('info', 'quote'));
    }

    public function bindQuote(UserQuoteRequest $request)
    {
        $authorizer = auth('account')->user();
        $quote = GetAQuote::where('quote_number', $request->get('quote_number'))->first();
        $quote->account_id = $authorizer->id;
        $quote->save();
        $authorizer->step_progress = 'quote_binded';
        $authorizer->save();
        return response()->json($quote, 200);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function personalAgreement()
    {
        $dateTime = Carbon::now()->toDateTimeString();
        $clientName = auth('account')->user()->full_name;
        return view('themes.sign_up.personal.personal-agreement', compact('dateTime', 'clientName'));
    }

    public function checkPersonalAgreement(Request $request)
    {
        $account = $this->guard('account')->user();
        /**
         * update progress do not update steps already done
         */
        if ($account->step_progress == 'quote_binded') {
            $input['step_progress'] = 'agreement_checked';
            $input['agreement_checked_date'] = Carbon::now()->toDateTimeString();
            $input['agreement_checked'] = true;
            $account->update($input);
        }

        return response()->json([], 200);
    }

    public function pickUpInformation()
    {
        $authorizer = $this->guard('account')->user();
        $pickUpInfo = $authorizer->pickUpInfo;
        return view('themes.sign_up.personal.pick-up-information', compact('pickUpInfo'));
    }
    public function deliveryInformation()
    {
        return view('themes.sign_up.personal.delivery-information');
    }

    public function bizCompanyProfile()
    {
        $authorizer = $this->guard('account')->user();
        $company = Company::where('id', $authorizer->company_id)->first();
        $companyContacts = $company ?  $company->accounts : collect([]);
        return view('themes.sign_up.biz.profile.index', compact('company', 'companyContacts'));
    }
    public function bizAgreement()
    {
        $dateTime = Carbon::now()->toDateTimeString();
        $clientName = auth('account')->user()->company->company_legal_name;
        return view('themes.sign_up.biz.agreement', compact('dateTime', 'clientName'));
    }

    public function bizBilling()
    {
        $authorizer = $this->guard('account')->user();
        $company = Company::where('id', $authorizer->company_id)->first();
        $companyContacts = $company ? $company->accounts : collect([$authorizer]);
        return view('themes.sign_up.biz.billing', compact('companyContacts'));
    }

    public function storeBizCompanyProfile(Request $request)
    {
        try {
            $contactsInputs = $request->only('contact_id', 'remove_contact', 'contact_type', 'first_name', 'last_name', 'job_title', 'business_phone_number', 'business_phone_ext', 'mobile_number', 'email', 'alternate_email');
            $authorizer = $this->guard('account')->user();

            if ($request->get('step') == 1) {
                $companyProfileInputs = $request->only('company_legal_name', 'company_dba');
                $companyAddress = $request->only('street_address', 'city', 'state', 'zip');
                $companyProfileInputs['account_id'] = $authorizer->id;

                $companyId = $request->get('company_id', false);

                if ($companyId) {
                    $company = Company::find($companyId);
                    $company->update($companyProfileInputs);
                    $physicAddress = $company->address()->where('sub_type', 'physic_address')->first();
                    $physicAddress->update([
                        'street_address' => $companyAddress['street_address'],
                        'city' => $companyAddress['city'],
                        'state' => $companyAddress['state'],
                        'zip' => $companyAddress['zip'],
                        'sub_type' => 'physic_address'
                    ]);
                } else {

                    $companyName = $companyProfileInputs['company_legal_name'];
                    $companyExists = Company::where('company_legal_name', $companyName)->first();
                    if ($companyExists) {
                        return response()->json(['error' => 'company_already_exists', 'company_id' => $companyExists->id], 400);
                    }

                    $authorizer->step_progress = 'setted-up-profile_step_1';
                    $role = Role::where('slug', 'company.creator')->first();
                    $authorizer->active = 1;
                    $company = Company::create($companyProfileInputs);
                    $authorizer->attachRole($role, $company->id);
                    $company->address()->create([
                        'street_address' => $companyAddress['street_address'],
                        'city' => $companyAddress['city'],
                        'state' => $companyAddress['state'],
                        'zip' => $companyAddress['zip'],
                        'sub_type' => 'physic_address'
                    ]);
                }
                $authorizer->company_id = $company->id;
            } else {
                $company = Company::where('id', $authorizer->company_id)->first();
                if (isset($contactsInputs['remove_contact']) && $contactsInputs['remove_contact']) {
                    Account::whereIn('id', $contactsInputs['remove_contact'])->delete();
                }
                foreach ($contactsInputs['contact_type'] as $key => $contactType) {
                    $contact = [
                        'company_id' => $company->id,
                        'type' => $authorizer->type,
                        'first_name' => $contactsInputs['first_name'][$key],
                        'last_name' => $contactsInputs['last_name'][$key],
                        'job_title' => $contactsInputs['job_title'][$key],
                        'business_phone_number' => $contactsInputs['business_phone_number'][$key],
                        'business_phone_ext' => $contactsInputs['business_phone_ext'][$key],
                        'mobile_number' => $contactsInputs['mobile_number'][$key],
                        'email' => $contactsInputs['email'][$key],
                        'alternate_email' => $contactsInputs['alternate_email'][$key]
                    ];

                    $account = Account::where('email', $contact['email'])->where('mobile_number', $contact['mobile_number'])->first();
                    if (!$account) {
                        $account = new Account();
                    }
                    foreach ($contact as $k => $c) {
                        $account->$k = $c;
                    }
                    $account->save();

                    if ($contactType == 'primary') {
                        $role = Role::where('slug', 'biz.primary')->first();
                        $account->attachRole($role, $company->id);
                        $authorizer->step_progress = 'setted-up-profile_step_2';
                    }
                    if ($contactType == 'normal') {
                        $role = Role::where('slug', 'biz.alternative')->first();
                        $account->attachRole($role, $company->id);
                        $authorizer->step_progress = 'setted-up-profile_step_3';
                    }
                    if ($contactType == 'manager_or_owner') {
                        $role = Role::where('slug', 'ops.mgr')->first();
                        $account->attachRole($role, $company->id);
                        if ($request->get('is_authority', false)) {
                            $authorizer->step_progress = 'setted-up-profile_step_4';
                        } else {
                            $authorizer->step_progress = 'agreement_checked';
                        }
                    }
                }
            }

            if ($request->get('is_authority', false)) {
                $authorizer->has_document_authority = true;
            }
            $authorizer->save();
            return response()->json($authorizer->load('company.accounts.roles'), 201);
        } catch (\Throwable $th) {
            abort(500, $th->getMessage());
        }
    }

    public function checkBizAgreement(Request $request)
    {
        $account = $this->guard('account')->user();
        $company = Company::where('id', $account->company_id)->first();
        $company->agreement_checked = true;
        $company->agreement_checked_account_id = $account->id;
        $company->agreement_checked_date = date('Y-m-d H:i:s', time());
        $company->save();
        /**
         * @var Account $account
         * no need update agreement when already checked
         */
        if ($account->account_step_number == 5) {
            $account->step_progress = 'agreement_checked';
        }
        $account->save();
        return response()->json([], 200);
    }

    public function storeBizBilling(Request $request)
    {
        $inputs = $request->only(
            'account_id',
            'first_name',
            'last_name',
            'job_title',
            'business_phone_number',
            'mobile_number',
            'business_phone_ext',
            'email',
            'alternate_email',
            'invoice_emails'
        );

        $account = Account::where('email', $inputs['email'])->where('mobile_number', $inputs['mobile_number'])->first();
        if (!$account) {
            $account = new Account();
        }
        $authorizer = $this->guard('account')->user();
        $inputs['company_id'] = $authorizer->company->id;
        foreach ($inputs as $key => $value) {
            $account->$key = $value;
        }
        $account->save();

        $role = Role::where('slug', 'ap.primary')->first();
        $account->attachRole($role, $authorizer->company->id);

        $authorizer->step_progress = 'setted-billing-info';
        $authorizer->save();

        return response()->json($account, 201);
    }


    public function carrierCompanyProfile(Request $request)
    {
        $authorizer = $this->guard('account')->user();
        $company = Company::where('id', $authorizer->company_id)->first();
        $companyContacts = $company ? $company->accounts : collect([$authorizer]);
        $physicAddress = $company ? $company->address()->where('sub_type', 'physic_address')->first() : null;
        $mailingAddress = $company ? $company->address()->where('sub_type', 'mailing_address')->first() : null;
        $isLast = $request->get('is_last', 0);
        $continueStep = $request->get('pass_step', 0) ? 1 : (Account::CARRIER_PROFILE_STEPS[$authorizer->step_progress] ?? 1);
        return view('themes.sign_up.carrier.profile.index', compact('company', 'companyContacts', 'physicAddress', 'mailingAddress', 'isLast', 'continueStep'));
    }

    public function storeCarrierCompanyProfile(Request $request)
    {
        try {
            $contactsInputs = $request->only('contact_id', 'contact_type', 'first_name', 'last_name', 'job_title', 'business_phone_number', 'business_phone_ext', 'mobile_number', 'email', 'alternate_email');
            $authorizer = $this->guard('account')->user();

            $dbStep =
                auth()
                ->guard('account')
                ->user()->account_step_number -
                1;
            $dbStep = $dbStep > 4 ? 4 : ($dbStep < 1 ? 1 : $dbStep + 1);
            if ($request->get('step') == 1) {
                $companyProfileInputs = $request->only('carrier_or_dot_search', 'dot_number', 'mc_number', 'company_legal_name', 'company_dba');
                $companyProfileInputs['account_id'] = $authorizer->id;
                $physicAddress = $request->only('street_address', 'city', 'state', 'zip', 'company_telephone', 'company_email');
                $mailingInputs = $request->only('mailing_street_address', 'mailing_city', 'mailing_state', 'mailing_zip', 'mailing_address_same_as_physical');
                if ($companyId = $request->get('company_id', false)) {
                    $company = Company::find($companyId);
                    $company->update($companyProfileInputs);
                    $addresses = $company->address()->get();
                    $phyAddress = $addresses->where('sub_type', 'physic_address')->first();
                    $mailingAddress = $addresses->where('sub_type', 'mailing_address')->first();
                    $phyAddress->update([
                        'street_address' => $physicAddress['street_address'],
                        'city' => $physicAddress['city'],
                        'state' => $physicAddress['state'],
                        'zip' => $physicAddress['zip'],
                        'telephone' => $physicAddress['company_telephone'],
                        'email' => $physicAddress['company_email']
                    ]);
                    $mailingAddress->update([
                        'street_address' => $mailingInputs['mailing_street_address'],
                        'city' => $mailingInputs['mailing_city'],
                        'state' => $mailingInputs['mailing_state'],
                        'zip' => $mailingInputs['mailing_zip'],
                        'mailing_address_same_as_physical' => isset($mailingInputs['mailing_address_same_as_physical']) ? true : false

                    ]);
                } else {

                    $companyName = $companyProfileInputs['company_legal_name'];
                    $companyExists = Company::where('company_legal_name', $companyName)->first();
                    if ($companyExists) {
                        return response()->json(['error' => 'company_already_exists', 'company_id' => $companyExists->id], 400);
                    }

                    $authorizer->step_progress = 'setted-up-profile_step_1';
                    $role = Role::where('slug', 'company.creator')->first();
                    $authorizer->active = 1;
                    $company = Company::create($companyProfileInputs);
                    $authorizer->company_id = $company->id;
                    $authorizer->attachRole($role, $company->id);
                    $company->address()->create([
                        'street_address' => $physicAddress['street_address'],
                        'city' => $physicAddress['city'],
                        'state' => $physicAddress['state'],
                        'zip' => $physicAddress['zip'],
                        'sub_type' => 'physic_address',
                        'telephone' => $physicAddress['company_telephone'],
                        'email' => $physicAddress['company_email']
                    ]);
                    $company->address()->create([
                        'street_address' => $mailingInputs['mailing_street_address'],
                        'city' => $mailingInputs['mailing_city'],
                        'state' => $mailingInputs['mailing_state'],
                        'zip' => $mailingInputs['mailing_zip'],
                        'sub_type' => 'mailing_address',
                        'mailing_address_same_as_physical' => isset($mailingInputs['mailing_address_same_as_physical']) ? true : false
                    ]);
                }
            } else {
                $company = Company::where('id', $authorizer->company_id)->first();
                if (isset($contactsInputs['contact_type'])) {
                    foreach ($contactsInputs['contact_type'] as $key => $contactType) {
                        $contact = [
                            'company_id' => $company->id,
                            'type' => $authorizer->type,
                            'first_name' => $contactsInputs['first_name'][$key],
                            'last_name' => $contactsInputs['last_name'][$key],
                            'job_title' => $contactsInputs['job_title'][$key],
                            'business_phone_number' => $contactsInputs['business_phone_number'][$key] ?? '',
                            'business_phone_ext' => $contactsInputs['business_phone_ext'][$key],
                            'mobile_number' => $contactsInputs['mobile_number'][$key] ?? '',
                            'email' => $contactsInputs['email'][$key],
                            'alternate_email' => $contactsInputs['alternate_email'][$key] ?? '',
                        ];
                        if (isset($contactsInputs['contact_id'][$key])) {
                            $contactModel = Account::find($contactsInputs['contact_id'][$key]);
                            $contactModel->update($contact);
                            if ($contactType == 'primary' && $dbStep == 2) {
                                $authorizer->step_progress = 'setted-up-profile_step_2';
                            }
                            if ($contactType == 'normal' && $dbStep == 3) {
                                $authorizer->step_progress = 'setted-up-profile_step_3';
                            }
                            if ($contactType == 'manager_or_owner' && $dbStep == 4) {
                                $authorizer->step_progress = 'setted-up-profile_step_4';
                            }
                        } else {
                            /**
                             * we may need check mobile number here.
                             */
                            $account = Account::where('email', $contact['email'])->where('mobile_number', $contact['mobile_number'])->first();
                            if (!$account) {
                                $account = Account::create($contact);
                            }

                            if ($contactType == 'primary') {
                                $role = Role::where('slug', 'dispatch.primary')->first();
                                $account->attachRole($role, $company->id);
                                if ($dbStep == 2) {
                                    $authorizer->step_progress = 'setted-up-profile_step_2';
                                }
                            }
                            if ($contactType == 'normal') {
                                $role = Role::where('slug', 'dispatch.alternative')->first();
                                $account->attachRole($role, $company->id);
                                if ($dbStep == 3) {
                                    $authorizer->step_progress = 'setted-up-profile_step_3';
                                }
                            }
                            if ($contactType == 'manager_or_owner') {
                                $role = Role::where('slug', 'ops.mgr')->first();
                                $account->attachRole($role, $company->id);
                                if ($dbStep == 4) {
                                    $authorizer->step_progress = 'setted-up-profile_step_4';
                                }
                            }
                        }
                    }
                } else {
                    if ($dbStep == 3) {
                        $authorizer->step_progress = 'setted-up-profile_step_3';
                    }
                }
                if ($request->get('have_authority', false)) {
                    $authorizer->has_document_authority = true;
                } else {
                    $authorizer->has_document_authority = false;
                    if ($request->input('step') == 4) {
                        $invitePerson = $contactsInputs['first_name'][0]." ". $contactsInputs['last_name'][0];
                        $this->sendInvitationEmail($authorizer, $invitePerson, $authorizer->company->company_legal_name, $contactsInputs['email'][0]);
                    }
                }
            }
            $authorizer->save();
            return response()->json($authorizer->load('company.accounts.roles'), 201);
        } catch (\Throwable $th) {
            abort(500, $th->getMessage());
        }
    }

    public function carrierAgreement(Request $request)
    {
        $user = auth('account')->user();
        $company = auth('account')->user()->company;
        $isLast = $request->input('is_last', false);
        $agreement = System::query()->where('key', 'carrier_broker_agreement')->first()->content ?? '';
        $emailTemplate = System::query()->where('key', 'email_certificate_of_insurance')->first();
        $emailTemplate = $emailTemplate->content ?? '';
        $emailTemplate = str_replace("[User F_Name]", $user->first_name, $emailTemplate);
        $emailTemplate = str_replace("[User L_Name]", $user->last_name, $emailTemplate);
        $emailTemplate = str_replace("[Carrier_Legal_Name]", $user->company->company_legal_name ?? '', $emailTemplate);
        $emailTemplate = str_replace("[Contact_Person]", $request->get('carrier_certificate_person'), $emailTemplate);
        return view('themes.sign_up.carrier.agreement.index', compact('company', 'isLast', 'user', 'agreement', 'emailTemplate'));
    }

    public function carrierSubmitAgreement(Request $request)
    {
        $account = $this->guard('account')->user();
        $company = Company::where('id', $account->company_id)->first();
        $company->carrier_certificate_person = $request->get('carrier_certificate_person');
        $company->carrier_certificate_email = $request->get('carrier_certificate_email');
        $company->carrier_certificate_fax = $request->get('carrier_certificate_fax');
        $company->skip_certification = $request->get('skip_certification') ? true : false;
        $company->agreement_checked = true;
        $company->agreement_checked_account_id = $account->id;
        $company->agreement_checked_date = date('Y-m-d H:i:s', time());
        $company->save();

        $emailTemplate = System::query()->where('key', 'email_certificate_of_insurance')->first();
        $emailTemplate = $emailTemplate->content ?? '';
        $emailTemplate = str_replace("[User F_Name]", $account->first_name, $emailTemplate);
        $emailTemplate = str_replace("[User L_Name]", $account->last_name, $emailTemplate);
        $emailTemplate = str_replace("[Carrier_Legal_Name]", $account->company->company_legal_name ?? '', $emailTemplate);
        $emailTemplate = str_replace("[Contact_Person]", $request->get('carrier_certificate_person'), $emailTemplate);
        /**
         * @var Account $account
         * no need update agreement when already checked
         */
        if ($account->account_step_number == 5) {
            $account->step_progress = 'agreement_checked';
            $newRegistrationEmail = new SendEmail([], env('NEW_REGISTER_EMAIL_NOTIFICATION_ADDRESS'), 'New Registration', 'New Registration');
            dispatch($newRegistrationEmail);
        }

        $account->save();
        $emailTitle = 'Urgent COI request: Order Hold (30 min) for COI naming Advantage Logistics LLC';
        $email = new SendEmail([], $request->get('carrier_certificate_email'), $emailTitle, $emailTemplate, $account->email);
        dispatch($email);
        return response()->json([], 200);
    }

    public function skipAgreement(Request $request)
    {
        $account = $this->guard('account')->user();
        $company = Company::where('id', $account->company_id)->first();
        $company->skip_certification = true;
        $company->save();
        if ($account->account_step_number == 5) {
            $account->step_progress = 'agreement_checked';
            $email = new SendEmail([], env('NEW_REGISTER_EMAIL_NOTIFICATION_ADDRESS'), 'New Registration', 'New Registration');
            dispatch($email);
        }
        $account->save();
        return response()->json([], 200);
    }

    public function carrierLoad(Request $request)
    {
        $authorizer = $this->guard('account')->user();
        $company = Company::where('id', $authorizer->company_id)->first();
        $companyContacts = $company->accounts ? $company->accounts : null;
        $mailingAddress = $authorizer->address()->where('sub_type', 'mailing_address')->first();;
        $loads = CarrierLoad::where('account_id', $authorizer->id)->first();
        $isLast = $request->input('is_last', 0);
        $continueStep = $request->get('pass_step', 0) ? 1 : (Account::CARRIER_LOAD_STEPS[$authorizer->step_progress] ?? 1);
        return view('themes.sign_up.carrier.load.index', compact('company', 'companyContacts', 'mailingAddress', 'loads', 'isLast', 'continueStep'));
    }

    public function carrierSubmitLoad(Request $request)
    {
        $loadsInput = $request->all();
        $authorizer = auth()->guard('account')->user();
        $load = CarrierLoad::where('account_id', $authorizer->id)->first();
        /**
         * post step lower then db step will be update
         */
        $dbStep =
            auth()
            ->guard('account')
            ->user()->account_step_number -
            6;
        $dbStep = $dbStep > 4 ? 4 : ($dbStep < 1 ? 1 : $dbStep + 1);

        if ($loadsInput['step'] == 1) {
            $data['account_id'] = $authorizer->id;
            $data['company_id'] = $authorizer->company_id;
            $data['truck_have_winch'] = $request->get('truck_have_winch');
            $data['equipment_capacity'] = $request->only(
                'total_trucks',
                'capacity_1_quantity',
                'capacity_1_apply',
                'capacity_3_quantity',
                'capacity_3_apply',
                'capacity_5_quantity',
                'capacity_5_apply',
                'capacity_7_quantity',
                'capacity_7_apply',
                'capacity_9_quantity',
                'capacity_9_apply'
            );
            if ($load) {
                $load->update($data);
                if ($authorizer->step_progress == 'agreement_checked') {
                    $authorizer->step_progress = 'setted-up-load_step_1';
                }
            } else {
                $load = CarrierLoad::create($data);
                $authorizer->step_progress = 'setted-up-load_step_1';
            }
        } else if ($loadsInput['step']  == 2) {
            $data['vehicle_types'] = $request->only('vehicle_types_hauled', 'vehicle_types_hauled_selected');
            if ($dbStep == 2) {
                $authorizer->step_progress = 'setted-up-load_step_2';
            }
            $load->update($data);
        } else if ($loadsInput['step']  == 3) {
            $data['account_id'] = $authorizer->id;
            $data['no_future_loads'] = $request->get('no_future_loads') ? true : false;
            $routes = $request->only(
                'direction',
                'notification',
                'search_origin',
                'search_dest',
                'origin_area',
                'origin_city',
                'origin_state',
                'origin_zip',
                'origin_radius',
                'dest_area',
                'dest_city',
                'dest_state',
                'dest_zip',
                'dest_radius'
            );
            $notifications = [];
            if (count($routes) > 0) {
                foreach ($routes['direction'] as $k => $direction) {
                    $data['routes'][$k]['direction'] = $routes['direction'][$k];
                    $data['routes'][$k]['notification'] = $routes['notification'][$k];
                    $data['routes'][$k]['origin_area'] = $routes['origin_area'][$k] ? json_decode($routes['origin_area'][$k]) : null;
                    $data['routes'][$k]['origin_city'] = $routes['origin_city'][$k];
                    $data['routes'][$k]['origin_state'] = $routes['origin_state'][$k];
                    $data['routes'][$k]['origin_zip'] = $routes['origin_zip'][$k];
                    $data['routes'][$k]['origin_radius'] = $routes['origin_radius'][$k];
                    $data['routes'][$k]['dest_area'] = $routes['dest_area'][$k] ? json_decode($routes['dest_area'][$k]) : null;
                    $data['routes'][$k]['dest_city'] = $routes['dest_city'][$k];
                    $data['routes'][$k]['dest_state'] = $routes['dest_state'][$k];
                    $data['routes'][$k]['dest_zip'] = $routes['dest_zip'][$k];
                    $data['routes'][$k]['dest_radius'] = $routes['dest_radius'][$k];
                    $data['routes'][$k]['search_origin'] = $routes['search_origin'][$k];
                    $data['routes'][$k]['search_dest'] = $routes['search_dest'][$k];
                    $notifications[] = $routes['notification'][$k];
                }
            } else {
                $data['routes'] = null;
            }
            if (in_array('Yes', $notifications)) {
                $data['has_notification_request'] = true;
            } else {
                $data['has_notification_request'] = false;
            }
            if ($dbStep == 3) {
                $authorizer->step_progress = 'setted-up-load_step_3';
            }
            $load->update($data);
        } else if ($loadsInput['step']  == 4) {
            $data['send_offer'] = $request->get('send_to', []);
            $data['max_offers'] = $request->get('max_load_offers');
            if ($dbStep == 3) {
                $authorizer->step_progress = 'setted-up-load_step_4';
            }
            $load->fill($data);
            $load->save();
        }
        $authorizer->save();
        return response()->json($load, 200);
    }

    public function carrierPayment(Request $request)
    {
        $plans = $this->paymentPlanRepository->groupedPlans();

        $paymentPlansNotUseFactor = $plans['not_use_factor'];
        $paymentPlansUseFactor = $plans['use_factor'];

        $authorizer = $this->guard('account')->user();
        $company = Company::find($authorizer->company_id);
        $paymentReceiver = $company->accounts->filter(function ($account) {
            return $account->hasRole('ar.primary');
        })->first();
        $useFactory = $authorizer->company->use_factory;
        $paymentPlan = $authorizer->carrierPaymentPlans->first();
        $taxPayer = $authorizer->company->taxPayer;
        $companyContacts = $company->accounts ?? null;
        $continueStep = $request->get('pass_step', 0) ? 1 : (Account::CARRIER_PAYMENT_STEPS[$authorizer->step_progress] ?? 1);
        return view('themes.sign_up.carrier.payment.index', compact('paymentPlansNotUseFactor', 'paymentPlansUseFactor', 'paymentReceiver', 'useFactory', 'paymentPlan', 'taxPayer', 'companyContacts', 'continueStep'));
    }

    public function carrierSubmitPayment(Request $request)
    {
        try {

            $authorizer = $this->guard('account')->user();
            /**
             * post step lower then db step will be update
             */
            $dbStep =
                $authorizer->account_step_number - 10;
            $dbStep = $dbStep > 6 ? 6 : ($dbStep < 1 ? 0 : $dbStep);
            if ($request->get('step') == 1) {
                $inputs = $request->only('contact_id', 'first_name', 'last_name', 'job_title', 'business_phone_number', 'business_phone_ext', 'mobile_number', 'email', 'alternate_email');
                $inputs['account_id'] = $authorizer->id;
                $inputs['company_id'] = $authorizer->company_id;
                $inputs['type'] = $authorizer->type;
                $company = Company::where('id', $authorizer->company_id)->first();
                $company->use_factory = $request->get('use_factory');
                $company->save();
                if (isset($inputs['contact_id'])) {
                    $paymentReceiver = Account::find($inputs['contact_id']);
                    $paymentReceiver->update($inputs);
                } else {
                    $paymentReceiver = Account::where('email', $inputs['email'])->first();
                    if (!$paymentReceiver) {
                        $paymentReceiver = Account::create($inputs);
                    }
                }
                if ($dbStep == 0) {
                    $authorizer->step_progress = 'setted-up-payment_step_1';
                }
                $role = Role::where('slug', 'ar.primary')->first();
                $paymentReceiver->attachRole($role, $company->id);
            }
            if ($request->get('step') == 2) {
                $inputs = $request->only('payment_plan_id');
                $syncs = [$inputs['payment_plan_id'] => ['company_id' => $authorizer->company_id, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())]];
                if ($dbStep == 1) {
                    $authorizer->step_progress = 'setted-up-payment_step_2';
                }
                $authorizer->carrierPaymentPlans()->sync($syncs);
            }

            if ($request->get('step') == 3) {
                $inputs = $request->only(
                    'payer_name',
                    'biz_name',
                    "tax_classification_value",
                    "federal_tax_classification",
                    "other_tax_classification_value",
                );

                $taxPayer = $authorizer->company->taxPayer;
                if ($taxPayer) {
                    $taxPayer->update($inputs);
                } else {
                    $inputs['company_id'] = $authorizer->company_id;
                    $inputs['account_id'] = $authorizer->id;
                    $authorizer->company->taxPayer()->create($inputs);
                }
                if ($dbStep == 2) {
                    $authorizer->step_progress = 'setted-up-payment_step_3';
                }
            }

            if ($request->get('step') == 4) {
                $inputs = $request->only(
                    "address",
                    "city",
                    "state",
                    "zip"
                );

                $taxPayer = $authorizer->company->taxPayer;
                if ($dbStep == 3) {
                    $authorizer->step_progress = 'setted-up-payment_step_4';
                }
                $taxPayer->update($inputs);
            }
            if ($request->get('step') == 5) {
                $inputs = $request->only(
                    'social_security_number',
                    'employer_identification_number'
                );
                /**
                 * verify taxpayer name + social_security_number + employer_identification_number valid below
                 */
                $taxPayer = $authorizer->company->taxPayer;
                if (isset($inputs['social_security_number'])) {
                    $processNumber = $inputs['social_security_number'];
                    $processType = 'SSN';
                    $processName = $taxPayer->payer_name;
                } else {
                    $processNumber = $inputs['employer_identification_number'];
                    $processType = 'EIN';
                    $processName = $taxPayer->biz_name ?? $taxPayer->payer_name;
                }
                $response = TinApiCallHistory::query()->where('process_number', str_replace('-', '', $processNumber))
                    ->where('process_type', $processType)->where('process_name', $processName)
                    ->first();

                if (!$response) {
                    $account = Account::query()->find($authorizer->id);
                    if ($account->tin_api_calls >= ACCOUNT::MAX_TIN_API_CALLS) {
                        return response()->json(['social_security_number' => ['The TIN and name combinations you have entered do not match.  Please contact the signup team @ signup@advlogs.com for assistance.']], 422);
                    }
                    $response = $this->CompanyRepository->processTINMatch((int)str_replace('-', '', $processNumber), $processName, $processType);
                    $apiCallHistory = new TinApiCallHistory();
                    $apiCallHistory->fill([
                        'process_number' => str_replace('-', '', $processNumber),
                        'process_type' => $processType,
                        'process_name' => $processName,
                        'response' => $response && $response['responseCode'] == 0 ? ['responseCode' => 0] : 0,
                    ])->save();

                    $account->increment('tin_api_calls', 1);
                } else {
                    $response = $response->response;
                }

                if (!$response) {
                    return response()->json(['social_security_number' => ['TIN Number is not correct!']], 422);
                } else {
                    if ($response['responseCode'] == 0) {
                        if ($dbStep == 4) {
                            $authorizer->step_progress = 'setted-up-payment_step_5';
                        }
                        $taxPayer->update($inputs);
                    } else {
                        return response()->json(['social_security_number' => [$response['responseDescription']]], 422);
                    }
                }
            }
            if ($request->get('step') == 6) {
                if ($dbStep == 5) {
                    $authorizer->step_progress = 'setted-up-payment_step_6';
                }
            }
            $authorizer->save();
            return response()->json($authorizer->load('company'), 200);
        } catch (\Throwable $th) {
            return response()->json('Server Error', 500);
        }
    }

    public function sendInvitationEmail($account, $invitedPerson, $legalName, $email)
    {
        $template = System::query()->where('key', 'email_signature_request_invitation')->first()->content ?? '';
        $template = str_replace("[Invited_Person]", $invitedPerson, $template);
        $template = str_replace("[User F_Name]", $account->first_name, $template);
        $template = str_replace("[User L_Name]", $account->last_name, $template);
        $template = str_replace("[Carrier_Legal_Name]", $legalName, $template);

        $invitationLink = env("APP_URL").'/sign-up?type=carrier';
        $template = str_replace("[Invitation_Link]", $invitationLink, $template);
        $emailTitle = 'Urgent Signature Request: Order pending for signature on Carrier Broker Agreement';
        $email = new SendEmail([], $email, $emailTitle, $template, $account->email);
        dispatch($email);
    }
}
