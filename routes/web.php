<?php
use App\Events\SendLocation;
use App\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map/{id}', function ($id) {
    $user = User::where('id', $id)
            ->first();
    $data = ["data"=>"Pusher data"];
    event(new SendLocation($data));
    return response()->json(['status'=>'success', 'data'=>$user]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
