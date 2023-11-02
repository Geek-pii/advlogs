<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Account;
use App\Models\Company;
use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AccountRepository;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    protected $account;

    public function __construct(AccountRepository $account)
    {
        $this->account = $account;
    }

    public function index(Request $request)
    {
        Breadcrumb::title(trans('admin_contact.title'));
        $companyId = $request->get('company_id');
        return view('admin.company.contact.index', compact('companyId'));
    }

    public function datatable(Request $request)
    {
        $data = $this->account->datatable($request->get('company_id'));
        return DataTables::of($data)
            ->addColumn('company', function (Account $account) {
                return $account->company->company_legal_name; 
            })
            ->addColumn('full_name', function (Account $account) {
                return $account->full_name;
            })
            ->addColumn('roles', function (Account $account) {
                 $roles = $account->roles('account')->get();
                 $result = [];
                if (!empty($roles)) {
                    foreach ($roles as $role) {
                        array_push($result, '<span class="badge badge-pill badge-info">'. $role['name'] .'</span>');
                    }
                  return implode(' ', $result);
                } else {
                  return "";
                }
            })
            ->addColumn(
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
                            'link_edit' => route('admin.contact.edit', $data->id),
                            'link_delete' => route('admin.contact.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_contact.edit'));

        $contact = $this->account->findOrFail($id);
        $contact->load('roles', 'company');
        $roles = Role::where('fillable_type', 'account')->get();
        
        return view(
            'admin.company.contact.create_edit',
            compact(
                'contact',
                'roles'
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

        $this->account->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_contact.account')]));

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

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_contact.account')]));

        return redirect()->back();
    }
}
