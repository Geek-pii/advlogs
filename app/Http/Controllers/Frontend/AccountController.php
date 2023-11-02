<?php

namespace App\Http\Controllers\Frontend;

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

    public function joinCompany(Request $request)
    {
        try {
            $companyId = $request->get('company_id');
            $accountId = auth('account')->user()->id;
            $this->account->bindAccountToCompany($accountId, $companyId);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
        return response()->json(true, 200);
    }
}
