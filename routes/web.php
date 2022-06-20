<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@welcome');


Route::get('/run-artisan',  'AuthController@runartisa');

Route::get('/dashboard',  'DashboardController@index');
Route::get('/view-applicants',  'ApplicantController@index');
Route::get('/user/accounts',    'AdminController@index');


Route::middleware(['userAuth'])->group( function () {



 Route::get('/signout', 'AuthController@signout');

});

