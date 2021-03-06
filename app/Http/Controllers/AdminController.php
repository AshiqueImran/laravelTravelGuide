<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;

class AdminController extends Controller
{
    public function login()
    {
    	return view('admin/login');
    }

    public function top5()
    {

        $sql="SELECT `bookingplace` , COUNT(bookingplace) as popular from bookingtable GROUP by `bookingplace` order by popular DESC limit 5";
        $topPlaces = DB::select($sql);

        $query="SELECT `bookedby` , COUNT(bookedby) as popular from bookingtable GROUP by `bookedby` order by popular DESC limit 5";
        $topMembers= DB::select($query);

        return view('admin/top5')
                ->with('topPlaces',$topPlaces)
                ->with('topMembers',$topMembers);
    }
    public function verifyAdmin(Request $request)
    {
            $this->validate($request, [
                'email' => 'required|email|exists:admin,email',
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
                'image' => 'required|mimes:jpeg,bmp,jpg,png',
            ]);

            $file = $request->file('image');
            //$file->move('images', $file->getClientOriginalName()); //to get original name
            $name = $request->plcaeName.".png";//ex: placeName.png
            $file->move('images', $name); //to get place name as photo name

            $imgPath="/images/".$name; //ex: /images/placeName.png

            $params =[
                'plcaeName' => $request->plcaeName,
                'details' => $request->details,
                'hotel' => $request->hotel,
                'category' => $request->category,
                'capacity' => $request->capacity,
                'map' => $request->map,
                'lastEdit' => $request->session()->get('adminEmail'),
                'image' => $imgPath,
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

            $info=DB::table('placetable')
             ->select('plcaeName','capacity')
            ->get(); 

            $today= DATE("Y-m-d");

            $sql="SELECT `bookingplace`, sum(`count`) as `total` FROM `bookingtable`  WHERE `checkout`>= '$today' and `time` <= '$today' and `status`='confirmed' group by `bookingplace`";

            $count = DB::select($sql);

            $limit = $limit+10; //every time increments by 10 rows

            return view('admin/showBooking')
            ->with('bookinfInfo',$res)
            ->with('nameCapacity',$info)
            ->with('counts', $count)
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

       $res= DB::table('bookingtable')
            ->select('bookingplace','bookedby')
            ->where('id', $id)
            ->get();

        Mail::to($res[0]->bookedby)
                ->send(new ConfirmationMail($res[0]->bookingplace));

        return redirect('/admin/showBookings/20');
    }

    public function editInfo()
    {
        $res= DB::table('placetable')
        ->select('plcaeName','capacity','details','hotel','id','category')
            ->get();

        return view('admin/editInfo')
                ->with('places',$res);
    }

    public function showEditInfo($id)
    {
        $res=DB::table('placetable')
             ->where('id', $id)
            ->get();
            //dd($res);
        return view('admin/editPage')
                ->with('res',$res);
    }

    public function editInfoSubmit(Request $request,$id)
    {
            $this->validate($request, [
                'plcaeName' => 'required|max:100',
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
            ->where('id',$id)
            ->update($params);

            return view ('admin/successful');
    }
    public function delInfo($id) //not done yet
    {
        $imgPath= DB::table('placetable') //to get path of image
            ->select('image') 
            ->where('id',$id)
            ->get();
        $image_path = public_path().'/'.$imgPath[0]->image;

        if(file_exists($image_path)) { // to check if image exists
            unlink($image_path);
            }

         DB::table('placetable')
             ->where('id', $id)
            ->delete();

        return redirect('/admin/editInfo');
    }
}
