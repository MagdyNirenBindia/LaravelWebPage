<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Event;
use Illuminate\Database\Eloquent\Model;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('TestUpdateHome');
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        Session::flush();
        return Redirect::to('login'); // redirect the user to the login screen
    }

}
