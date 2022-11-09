<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegistrationController extends Controller
{
    public function index()
    {
        $this->data['headline'] = 'login';
        return  view('register.form', $this->data);
    }


    public function customRegister(RegisterRequest $request)
    {
        $data = $request->all();
        $data['name']     = $request->name;
        $data['email']    = $request->email;
        $data['password'] =  Hash::make($request->password);

        Admin::create($data);
        return redirect("login")->withSuccess('You have signed-in');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
