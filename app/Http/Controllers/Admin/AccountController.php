<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Account;
use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AccountRepository;
use Yajra\DataTables\Facades\DataTables;

class AccountController extends Controller
{
    protected $account;

    public function __construct(AccountRepository $account)
    {
        $this->account = $account;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_account.title'));

        return view('admin.account.index');
    }

    public function datatable()
    {
        $data = $this->account->datatable();

        return DataTables::of($data)
            ->addColumn('company', function (Account $account) {
                if ($account->type !== 'personal') {
                    return $account->company ? '<a target="_blank" href="' . route('admin.company.show', ['id' => $account->company->id ?? 0]) . '" class="btn btn-block bg-gradient-primary btn-sm"><i class="fa fa-link"></i>&nbsp;&nbsp;' . $account->company->company_legal_name . '</a>' : '';
                }
            })
            ->editColumn('primary_contact_number', function(Account $account) {
                return '<span class="badge badge-pill badge-info">'. $account->primary_contact_number_type . '</span> ' . $account->primary_contact_number; 
            })
            ->editColumn('business_phone_number', function(Account $account) {
                return '<span class="badge badge-pill badge-info">'. $account->business_phone_number_type . '</span> ' . $account->business_phone_number; 
            })
            ->editColumn('mobile_number', function(Account $account) {
                return '<span class="badge badge-pill badge-info">'. $account->mobile_number_type . '</span> ' . $account->mobile_number; 
            })
            ->addColumn('full_name', function (Account $account) {
                return $account->full_name;
            })
            ->addColumn('roles', function (Account $account) {
                $roles = $account->roles('account')->get();
                $result = [];
                if (!empty($roles)) {
                    foreach ($roles as $role) {
                        array_push($result, '<span class="badge badge-pill badge-info">' . $role['name'] . '</span>');
                    }
                    return implode(' ', $result);
                } else {
                    return "";
                }
            })
            ->editColumn(
                'created_at',
                function ($data) {
                    return $data->created_at->format('Y-m-d H:i:s');
                }
            )
            ->editColumn(
                'approval',
                function ($data) {
                    if ($data->active == 'Y') {
                        return view('admin.layouts.parts.table_button')->with(
                            [
                                'id_un_approval' => $data->id,
                                'link_user_un_approval' => route('admin.account.un-approval', $data->id),
                            ]
                        )->render();
                    } else {
                        return view('admin.layouts.parts.table_button')->with(
                            [
                                'id_approval' => $data->id,
                                'link_user_approval' => route('admin.account.approval', $data->id),
                            ]
                        )->render();
                    }
                }
            )
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
        Breadcrumb::title(trans('admin_account.create'));

        return view('admin.account.create_edit');
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

        $this->account->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_account.plan')]));

        return redirect()->route('admin.account.index');
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
        Breadcrumb::title(trans('admin_account.edit'));

        $account = $this->account->findOrFail($id);
        $account->load('roles');
        $roles = Role::where('fillable_type', 'account')->get();

        return view(
            'admin.account.create_edit',
            compact(
                'account',
                'roles'
            )
        );
    }

    public function approveUser(Request $request, $id)
    {
        $account = $this->account->findOrFail($id);
        $account->active = 1;
        $account->save();
        return redirect()->back();
    }

    public function unApprovalUser(Request $request, $id)
    {
        $account = $this->account->findOrFail($id);
        $account->active = 0;
        $account->save();
        return redirect()->back();
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
        $account = $this->account->findOrFail($id);
        $inputs = $request->only("first_name", "last_name", "email", 'alternate_email', "mobile_number", "primary_contact_number",  "job_title", "business_phone_number", "business_phone_ext", "active");
        foreach ($inputs as $key => $value) {
            $account->$key = $value;
        }
        $account->save();
        $roles = $request->get('roles', []);
        if (!empty($roles)) {
            $account->syncRoles($roles);
        }

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_account.title')]));

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
        $this->account->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_account.title')]));

        return redirect()->back();
    }
}
