<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\PaymentPlanRepository;

class PaymentPlanController extends Controller
{
    protected $plan;

    public function __construct(PaymentPlanRepository $plan)
    {
        $this->plan = $plan;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_payment_plan.title'));

        return view('admin.payment_plan.index');
    }

    public function datatable()
    {
        $data = $this->plan->datatable();

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
                            'link_edit' => route('admin.payment.plan.edit', $data->id),
                            'link_delete' => route('admin.payment.plan.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_payment_plan.create'));

        return view('admin.payment_plan.create_edit');
    }

    /**
     * Department a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->plan->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_payment_plan.plan')]));

        return redirect()->route('admin.payment.plan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_payment_plan.edit'));

        $plan = $this->plan->findOrFail($id);

        return view(
            'admin.payment_plan.create_edit',
            compact(
                'plan'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->plan->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_payment_plan.plan')]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->plan->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_payment_plan.plan')]));

        return redirect()->back();
    }
}
