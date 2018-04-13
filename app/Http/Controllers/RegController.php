<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegController extends Controller
{
   public function index()
   {
   		return view("reg/reg");
   }
    public function newUser(Request $request)
   {
   		  $this->validate($request, [
                'name' => 'required',
                'ph' => 'required|numeric',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'email' => 'required|unique:usertable|email',
            ]);
           $pass=password_hash($request->password, PASSWORD_DEFAULT);
           $params=[
                  'name' => $request->name,
                  'email' => $request->email,
                  'mobile' => $request->ph,
                  'password' => $pass
           ];
            DB::table('usertable')
               ->insert($params);
            return view("reg/successful");
     //     echo $request->name;
   		// echo $request->ph;
   		// echo $request->email;
   		// echo $pass;
   		// echo $request->password_confirmation; 
   }
}
