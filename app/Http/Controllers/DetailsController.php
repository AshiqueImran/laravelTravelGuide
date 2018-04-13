<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    public function show(Request $request)
    {
    	 $res = DB::table('placetable')
            ->where('plcaeName', $request->place)
            ->get();

            //dd($res[0]->plcaeName);

            $url="https://api.wunderground.com/api/405b549fa3d35efb/conditions/q/BD/".strtolower($res[0]->plcaeName).".json";
			$json=file_get_contents($url);
			$weatherArray=json_decode($json,true);
			
			//dd($weatherArray['current_observation']['temperature_string']);

	          return view('user/details')
	          ->with('place',$res)
	          ->with('weatherArray',$weatherArray);
	    	//echo $request->place;
    }
    public function showDetails($place)
    {
         $res = DB::table('placetable')
            ->where('plcaeName', $place)
            ->get();

            //dd($res[0]->plcaeName);

            $url="https://api.wunderground.com/api/405b549fa3d35efb/conditions/q/BD/".strtolower($res[0]->plcaeName).".json";
            $json=file_get_contents($url);
            $weatherArray=json_decode($json,true);
            
            //dd($weatherArray['current_observation']['temperature_string']);

              return view('user/details')
              ->with('place',$res)
              ->with('weatherArray',$weatherArray);
            //echo $request->place;
    }
    public function goBackToHome()
    {
    	return redirect('/home');
    }
    public function myBookings(Request $request)
    {
            $res = DB::table('bookingtable')
            ->where('bookedby', $request->session()->get('email'))
            ->get();

        return view ('user/myBooking')
            ->with('bookedInfo',$res);
    }
    public function showPassPage()
    {
        return view('user/pass');
    }
    public function changePass(Request $request)
    {
            $this->validate($request, [
                'old' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);

           $pass=password_hash($request->password, PASSWORD_DEFAULT);

            $res = DB::table('usertable')
            ->where('email', $request->session()->get('email'))
            ->get();

            if(password_verify($request->old,$res[0]->password))
           {
                $params = [
                    'password' => $pass
                ];

                DB::table('usertable')
                ->where('email', $request->session()->get('email'))
                ->update($params);
                return view ('reg/successful');
           }
           else
           {
            return view('user/pass',['error' => 'Wrong old password']);
           }
    }
}
