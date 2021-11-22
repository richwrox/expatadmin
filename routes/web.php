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



Route::get('/signin', 'AuthController@signin');
Route::get('/callback', 'AuthController@callback');
Route::get('/signup', 'AuthController@create');




Route::middleware(['userAuth'])->group( function () {

 Route::get('/user/home',  'HomeController@index');
 Route::get('/user/list', 'EmployeeController@index');
 Route::get('/labs', 'LabController@index');
 Route::get('/labs/users', 'LabController@viewUserGroups');

 // Route::get('/leave/new', 'LeaveController@index');
 // Route::get('/calendar', 'CalendarController@calendar');
 // Route::get('/calendar/new', 'CalendarController@getNewEventForm');
 // Route::post('/calendar/new', 'CalendarController@createNewEvent');
 

 Route::get('/signout', 'AuthController@signout');

});

