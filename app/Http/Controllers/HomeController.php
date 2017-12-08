<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

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
     * Show list of patients for today
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::whereDate('s_date', date("Y-m-d"))->join('patients', 'sessions.user_id', '=', 'patients.id')->get();
        return view('home', ['sessions' => $sessions]);
    }
}
