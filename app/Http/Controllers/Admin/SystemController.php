<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\SystemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Breadcrumb;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class SystemController extends Controller
{
    protected $system;

    public function __construct(SystemRepository $system)
    {
        $this->system = $system;
    }

    public function edit($id)
    {
        Breadcrumb::title(trans('admin_system.title'));

        $system = $this->system->all()->keyBy('key')->toArray();

        return view("admin.system.edit", compact("system"));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->system->update($input, $id);

        Cache::forget('system_array');

        // if enable maintenance mode
        $system = $this->system->findByField('key', 'maintenance_mode')->first();
        if ($system && $system->content) {
            Artisan::call('down');
        } else {
            Artisan::call('up');
        }

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_system.system')]));

        return redirect()->route('admin.system.edit', '011089');
    }
}
