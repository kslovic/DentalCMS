<?php

namespace App\Http\Controllers;

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
        $sessions = Session::whereDate('s_date', date("Y-m-d"))->join('patients', 'sessions.patient_id', '=', 'patients.id')->get();
        $session_notifications = Session::whereDate('s_date', new DateTime('tomorrow'))->join('patients', 'sessions.patient_id', '=', 'patients.id')->get();
        foreach ($session_notifications as $session_notification) {
            if($session_notification['email']!=null) {
                \Mail::send('email.notify', ['name' => $session_notification['name'], 'date' => $session_notification['s_date']], function ($message) use ($session_notification) {
                    $message->to($session_notification['email'], $session_notification['name'])
                        ->subject('Obavijest o zakazanom terminu');
                });
            }
            else{
                \Mail::send('email.callpatient', ['name' => $session_notification['name'], 'lname' => $session_notification['lname'], 'date' => $session_notification['s_date'], 'phone' => $session_notification['phone']], function ($message) use ($session_notification) {
                    $message->to('kslovic201294@gmail.com')
                        ->subject('Obavijest o zakazanom terminu');
                });
            }
        }
        return view('home', ['sessions' => $sessions]);
    }
}
