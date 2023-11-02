<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactCreateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function contact_form(Request $request)
    {
        //$input = $request->validated();
        if($request->department == 'Client Services'){
            $email = 'jessary@advlogs.com';
        }
        else if($request->department == 'Dispatch'){
            $email = 'dispatch@advlogs.com';
        }
        else if($request->department == 'Accounting'){
            $email = 'accounting@advlogs.com';
        }
        else if($request->department == 'Signup Team'){
            $email = 'signup@advlogs.com';
        }
        else{
            $email = 'info@advlogs.com';
        }

        $data=collect();
        $data->email=$request->email;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->phone=$request->phone;
        $data->department=$request->department;
        $data->message=$request->message;

        $input = $request->all();
        //$con = Contact::query()->create($input);
        //if($con){
            //Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Email($data,url('/')));
            Mail::to($email)->send(new Email($data));
        //}
        $msg = 'Thanks for contacting us, we will get back to you as soon as possible!';
        // dd($email);
        // session()->flash('success', 'Contacted successfully, we will get back to you as soon as possible!');
        return response()->json($msg);
        // return redirect()->back()->withFragment('#contact-inner-form-wrapper');
    }
}
