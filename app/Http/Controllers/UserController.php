<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function home()
    {
    	return view('user/home');
    }
    public function autoSuggest(Request $request)
    {
    	    $res = DB::table('bookingtable')
            ->where('bookedby', $request->session()->get('email'))
            ->pluck('bookingplace');

            $visitedPlaces= array();
            foreach ($res as  $value) {
            	array_push($visitedPlaces,$value);
            }

            $allPlaces = DB::table('placetable')
            ->get();
            //-> pluck('plcaeName', 'image');
			//dd($allPlaces);
            return view('user/autoSuggest')
            ->with('visitedPlaces',$visitedPlaces)
            ->with('allPlaces',$allPlaces);
    }
}
