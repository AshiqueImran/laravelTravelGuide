<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login()
    {
    	return view('admin/login');
    }
    public function verifyAdmin(Request $request)
    {
            $this->validate($request, [
                'email' => 'required|email',
                'adminPass' => 'required',
            ]);

            $res = DB::table('admin')
            ->where('email', $request->email)
            ->get();

            if(password_verify($request->adminPass,$res[0]->password))
            {
            	$request->session()->put('adminEmail', $res[0]->email);
            	$request->session()->put('admin', $res[0]->name);
            	return redirect('/admin/home');
            }
            else
            {
            	return view('admin/login', ['error' => 'Wrong Email or Password']);
            }
    	// echo $request->adminName ."<br>";
    	// echo $request->adminPass;
    }

    public function home()
    {
    	return view('admin/home');
    }

    public function showPassPage()
    {
        return view ('user/pass');
    }
    public function changePass(Request $request)
    {
            $this->validate($request, [
                'old' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);

           $pass=password_hash($request->password, PASSWORD_DEFAULT);

            $res = DB::table('admin')
            ->where('email', $request->session()->get('adminEmail'))
            ->get();
          
            if(password_verify($request->old,$res[0]->password))
               {
                    $params = [
                        'password' => $pass
                    ];

                    DB::table('admin')
                    ->where('email', $request->session()->get('adminEmail'))
                    ->update($params);
                    return view ('admin/successful');
               }
           else
               {
                    return view('user/pass',['error' => 'Wrong old password']);
               }
    }

    public function showAddAdminPage()
    {
        return view ('admin/addAdmin');
    }

    public function AddAdmin(Request $request)
    {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'email|required|unique:admin',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);
            $pass=password_hash($request->password, PASSWORD_DEFAULT);

            $params = [
                'password' => $pass,
                'name' => $request->name,
                'email' => $request->email,
                'addedBy' => $request->session()->get('adminEmail'),
            ];

            DB::table('admin')
            ->insert($params);
            return view ('admin/successful');
    }

    public function showAddInfoPage()
    {
        return view('admin/addInfo');
    }

    public function addInfo(Request $request)
    {
            $this->validate($request, [
                'plcaeName' => 'required|max:100|unique:placetable',
                'map' => 'required',
                'details' => 'required|max:220',
                'hotel' => 'required|max:150',
                'capacity' => 'required|numeric',
                'category'=>'required',
            ]);

            $params =[
                'plcaeName' => $request->plcaeName,
                'details' => $request->details,
                'hotel' => $request->hotel,
                'category' => $request->category,
                'capacity' => $request->capacity,
                'map' => $request->map,
                'lastEdit' => $request->session()->get('adminEmail'),
            ];

            DB::table('placetable')
            ->insert($params);

            return view ('admin/successful');
    }

    public function showBookings($limit)
    {
             $res = DB::table('bookingtable')
             ->orderBy('time', 'desc')
             ->limit($limit)
            ->get();

            $limit = $limit+10; //every time increments by 10 rows

            return view('admin/showBooking')
            ->with('bookinfInfo',$res)
            ->with('limit',$limit);
    }

    public function deleteBooking($id)
    {
        DB::table('bookingtable')
             ->where('id', $id)
            ->delete();

        return redirect('/admin/showBookings/20');
    }

    public function confirmBooking($id)
    {
        $params = [
            'status' => 'confirmed'
        ];   
        
        DB::table('bookingtable')
        ->where('id', $id)
        ->update($params);

        return redirect('/admin/showBookings/20');
    }

}
