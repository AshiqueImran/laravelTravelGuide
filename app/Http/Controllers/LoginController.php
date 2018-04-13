<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
    	//echo "hello";
    	return view('login/login');
    }

    public function verify(Request $request)
    {
    	//echo $request->password;
    	//dd( $request->email);
            $this->validate($request, [
                'password' => 'required',
                'email' => 'email|required',
            ]);

            $res = DB::table('usertable')
            ->where('email', $request->email)
            ->get();
            if(password_verify($request->password,$res[0]->password))
            {
                //dd($res[0]->password);
                $request->session()->put('email', $res[0]->email);
                $request -> session() -> put ('user',$res[0]->name);
                return redirect('/home');
            }
            else
            {
                return view('login/login', ['error' => 'Wrong Email or Password']);
            }
    }
}
