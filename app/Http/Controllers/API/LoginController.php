<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Pegawai;
use Hash;

class LoginController extends Controller
{
    public function login(Request $request){
    	if($request->isJson()){
    		if($request->get('username') && $request->get('password')){
    			$username = $request->get('username');
    			$password = $request->get('password');    			

    			if($pegawai = Pegawai::where('username', $username)->first()){

    				if (Hash::check($password, $pegawai->password)) {
    						return response()->json(['status' => 200,'_token' => $pegawai->api_token]);
					}else{
						return response()->json(['error'=>true, 'message' => 'Password Salah!']);	
					}
    			}else{
    				return response()->json(['error'=>true, 'message' => 'Username Salah!']);
    			}

    		}
    	}else{
    		return response()->json(['error'=>true, 'message' => 401]);
    	}
    }
}
