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

Route::get('/', function () {
    return view('auth/login');
});


Route::get('/RegisterPage.php', function () {
    return view('RegisterPage');
});


Route::get('/testHome', function () {
    return view('TestHome');
});

Route::get('/BrowseEvents.php', function () {
    return view('BrowseEvents');
});

Route::get('/Example.blade.php', function () {
    return view('Example');
});

Route::get('/data', 'EventsController@index');

Route::get('/createEvent', 'EventsController@showCreateEvent');
Route::post('/createEvent', 'EventsController@doCreateEvent');


Route::get('/testAjax', 'EventsController@getData');


Auth::routes();
Route::get('/home', 'HomeController@index');
//Route::get('/logout',function(){
  //  return view('auth/login');
//});
Route::get('/logout', 'HomeController@doLogout');
?>
