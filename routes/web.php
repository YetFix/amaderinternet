<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
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

Route::post('/send', function (Request $request) {
   
    $details = [
        'name' =>$request->name,
        'email' => $request->email,
        'subject'=>$request->subject,
        'message'=>$request->message,
    ];
   
    Mail::to('mail.kawsar12@gmail.com')->send(new SendMail($details));
    Session::flash('alert-success', 'Message Send Successfully!');
    return back();
})->name('send');


