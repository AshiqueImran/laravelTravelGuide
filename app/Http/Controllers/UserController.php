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

    public function bookNowPage($place)
    {
        return view ('user/bookNow')
            ->with('placeName',$place);
    }

    public function bookNow(Request $request,$place)
    {
        $this->validate($request, [

            'placeName' => 'required|max:100|exists:placetable,plcaeName',
            'mobile' => 'required|numeric',
            'trxId' => 'required',
            'seat' => 'required|numeric',
            'checkIn' => 'required|date|after_or_equal:today',
            'checkOut' => 'required|date|after_or_equal:today',
        ]);

        if($request->placeName != $place)
        {
           return redirect('/home');
        }
        else
        {
            $res=DB::table('placetable')
             ->where('plcaeName', $request->placeName)
            ->get();

            //dd($res[0]->hotel);

            $params=[
                'bookingplace' =>$request->placeName,
                'hotel' => $res[0]->hotel,
                'bookedby' => $request->session()->get('email'),
                'mobile'=>$request->mobile,
                'time' => $request->checkIn,
                'checkout'=> $request->checkOut,
                'count'=>$request->seat,
                'TrxID'=>$request->trxId,
                'price' => 500 * $request->seat,
            ];

            DB::table('bookingtable')
                ->insert($params);

            return view("reg/successful");
        }
    }
}
