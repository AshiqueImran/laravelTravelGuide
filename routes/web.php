<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//user
Route::group(['middleware' => ['sess']], function(){
	Route::get('/home', 'UserController@home');
	Route::get('/autoSuggest', 'UserController@autoSuggest');
	Route::post('/details', 'DetailsController@show');
	Route::get('/details', 'DetailsController@goBackToHome');
	Route::get('/details/{place}', 'DetailsController@showDetails');
	Route::get('/changePass','DetailsController@showPassPage');
	Route::post('/changePass','DetailsController@changePass');
	Route::get('/myBookings','DetailsController@myBookings');
	Route::get('/bookNow/{place}','UserController@bookNowPage');
	Route::post('/bookNow/{place}','UserController@bookNow');
});

//admin
Route::group(['middleware' => ['adminSess']], function(){
	Route::get('/admin/home', 'AdminController@home');
	Route::get('/admin/pass', 'AdminController@showPassPage');
	Route::post('/admin/pass', 'AdminController@changePass');
	Route::get('/admin/addAdmin', 'AdminController@showAddAdminPage');
	Route::post('/admin/addAdmin', 'AdminController@AddAdmin');
	Route::get('/admin/addinfo', 'AdminController@showAddInfoPage');
	Route::post('/admin/addinfo', 'AdminController@addInfo');
	Route::get('/admin/showBookings/{limit}', 'AdminController@showBookings');
	Route::get('/admin/del/{id}', 'AdminController@deleteBooking');
	Route::get('/admin/confirm/{id}', 'AdminController@confirmBooking');
	Route::get('/admin/editInfo','AdminController@editInfo');
	Route::get('/admin/editInfo/del/{id}','AdminController@delInfo');
	Route::get('/admin/edit/{id}','AdminController@showEditInfo');
	Route::get('/admin/top5','AdminController@top5');
	Route::post('/admin/edit/{id}','AdminController@editInfoSubmit');
});

//no session in this 8 routes
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LogoutController@index');

Route::get('/reg', 'RegController@index');
Route::post('/reg', 'RegController@newUser');

Route::get('/admin', 'AdminController@login');
Route::post('/admin', 'AdminController@verifyAdmin');

Route::get('/', function () {
    return view('index');
});
