<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;

use App\Http\Requests;

class LoginController extends Controller
{
    public function login(){
        $input = Input::all();
        if(count($input) > 0){
            $auth = auth()->guard('pegawais');

            $credentials = [
                'username' =>  $input['username'],
                'password' =>  $input['password'],
            ];

            if ($auth->attempt($credentials)) {
                 return redirect('/');
            } else {
            	session()->flash('msg','Hey, You have a message to read');
                return redirect('pegawai/login');
            }
        } else {
            return view('pegawai.login');
        }
    }

    public function logout(){
    	Auth::guard('pegawais')->logout();
    	return redirect('/');
    }
}
