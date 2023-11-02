<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\User;
use App\Helper\Breadcrumb;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        Breadcrumb::title(trans('admin_dashboard.dashboard'));

        $count_page = Page::count();
        $count_user = User::count();

        return view('admin.dashboard.index', compact(
            'count_page',
            'count_user'
        ));
    }
}
