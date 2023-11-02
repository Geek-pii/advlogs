<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
class InfoController extends Controller
{
    //
    public function tooltip_menu(){
        $info = Info::all();
        dd($info);
        return response()->json($info);
    }
}
