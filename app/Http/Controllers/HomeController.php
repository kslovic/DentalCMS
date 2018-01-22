<?php

namespace App\Http\Controllers;

use App\CMSConfig;
use App\Session;
use DateTime;
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
        $sessions = Session::select('sessions.id AS sid','patients.id AS pid', 's_date', 'description', 'name', 'lname')->whereDate('s_date', date("Y-m-d"))->join('patients', 'sessions.patient_id', '=', 'patients.id')->orderBy('s_date','asc')->get();
        return view('home', ['sessions' => $sessions]);
    }

    public function setup()
    {
        $config = CMSConfig::first();
        return view('editconfig', ['config' => $config]);
    }
    public function postsetup(Request $request)
    {
        $request->validate([
            'time' => 'required|date_format:"H:i"',
            'email' => 'required|email',
        ]);
        CMSConfig::where('id',1)->update(['email' => $request->email, 'time' => "2000-01-01 ".$request->time]);

        $config = CMSConfig::first();
        return view('editconfig', ['config' => $config, 'status' => "Postavke uspiješno uređene !"]);
    }
}
