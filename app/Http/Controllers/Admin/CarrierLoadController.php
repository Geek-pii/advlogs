<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\Company;
use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarrierLoad;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\CarrierLoadRepository;

class CarrierLoadController extends Controller
{

    protected $carrierLoad;

    public function __construct(CarrierLoadRepository $carrierLoad)
    {
        $this->carrierLoad = $carrierLoad;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_carrier_load.title'));
        $company = Company::findOrFail(request()->get('company_id'));
        return view('admin.company.carrier_load.index', compact('company'));
    }

    public function datatable()
    {
        $companyId = request()->get('company_id', null);
        $data = $this->carrierLoad->datatable($companyId);
        return DataTables::of($data)
            ->addColumn('company', function (CarrierLoad $carrierLoad) {
                    return '<a target="_blank" href="' . route('admin.company.show', ['id' => $carrierLoad->company_id]) . '" class="btn btn-block bg-gradient-primary btn-sm"><i class="fa fa-link"></i>&nbsp;&nbsp;' . $carrierLoad->company->company_legal_name . '</a>';
            })
            ->addColumn('equipment_capacity', function($data) {
                return view('admin.company.carrier_load.action_button')->with([
                    'view_equipment' => $data->id,
                    'edit_equipment' => $data->id
                ]);
            })
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.parts.table_button')->with(
                        [
                            'link_edit' => route('admin.account.edit', $data->id),
                            'link_delete' => route('admin.account.destroy', $data->id),
                            'id_delete' => $data->id,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrierLoad = $this->carrierLoad->model()->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
