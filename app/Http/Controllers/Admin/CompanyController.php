<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\PaymentPlanRepository;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{

    protected $company;
    protected $paymentPlanRepository;

    public function __construct(CompanyRepository $company, PaymentPlanRepository $paymentPlanRepository)
    {
        $this->company = $company;
        $this->paymentPlanRepository = $paymentPlanRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        Breadcrumb::title(trans('admin_company.title'));
        return view('admin.company.index');
    }

    public function datatable()
    {
        $data = $this->company->datatable();
        return DataTables::of($data)
            ->editColumn(
                'created_at',
                function ($data) {
                    return $data->created_at->format('Y-m-d H:i:s');
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.parts.table_button')->with(
                        [
                            'link_show' => route('admin.company.show', $data->id),
                            'link_edit' => route('admin.company.edit', $data->id),
                            'link_delete' => route('admin.company.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_company.create'));

        return view('admin.company.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->company->create($input);

        session()->flash('success', trans('admin_company.created_successful', ['attr' => trans('admin_company.company')]));

        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($companyId)
    {
        Breadcrumb::title(trans('admin_company.show'));

        $company = $this->company->findOrFail($companyId);
        $company->load('accounts');
        $paymentPlans = $this->paymentPlanRepository->groupedPlans();
        return view('admin.company.show', compact('company', 'paymentPlans', 'companyId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_company.edit'));

        $company = $this->company->findOrFail($id);
        $company->load('carrierPaymentPlans');
        $paymentPlans = $this->paymentPlanRepository->groupedPlans();
        return view(
            'admin.company.create_edit',
            compact(
                'company',
                'paymentPlans'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $companyInputs = $request->only(
            'use_factory',
            'company_legal_name',
            'company_dba',
            'street_address',
            'city',
            'state',
            'zip',
            'mailing_street_address',
            'mailing_city',
            'mailing_state',
            'mailing_zip',
            'carrier_certificate_person',
            'carrier_certificate_email'
        );
        $company = $this->company->findOrFail($id);
        foreach($companyInputs as $key => $value) {
            $company->$key = $value;
        }
        $company->save();
        if ($request->get('use_factory') == 'Y') {
            $paymentPlanId = $request->get('use_payment_plan_id');
        } else {
            $paymentPlanId = $request->get('not_payment_plan_id');
        }
        $syncs = [$paymentPlanId => ['account_id' => $company->account_id, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())]];

        $company->carrierPaymentPlans()->sync($syncs);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_company.title')]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
