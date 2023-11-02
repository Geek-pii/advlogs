<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

use App\Repositories\DepartmentRepository;

class DepartmentController extends Controller
{
    protected $department;

    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_department.title'));

        return view('admin.department.index');
    }

    public function datatable()
    {
        $data = $this->department->datatable();

        return DataTables::of($data)
            ->editColumn(
                'active',
                function ($data) {
                    return $data->active != 0 ? '<span class="material-icons">done</span>' : '';
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.parts.table_button')->with(
                        [
                            'link_edit' => route('admin.department.edit', $data->id),
                            'link_delete' => route('admin.department.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_department.create'));

        return view('admin.department.create_edit');
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

        $this->department->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_department.department')]));

        return redirect()->route('admin.department.index');
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
        Breadcrumb::title(trans('admin_department.edit'));

        $department = $this->department->findOrFail($id);

        return view(
            'admin.department.create_edit',
            compact(
                'department'
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

        $this->department->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_department.department')]));

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
        $this->department->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_department.department')]));

        return redirect()->back();
    }
}
