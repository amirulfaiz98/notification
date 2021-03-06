<?php

use Illuminate\Support\Facades\Route;


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


Route::get('/notify', function () {

    $user = \App\Models\User::find(1);

    $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is our example notification tutorial',
            'thanks' => 'Thank you for visiting codechief.org!',
    ];

    $user->notify(new \App\Notifications\TaskComplete($details));

    return dd("Done");
});

Route::get('/markAsRead', function(){

	auth()->user()->unreadNotifications->markAsRead();

	return redirect()->back();

})->name('mark');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
