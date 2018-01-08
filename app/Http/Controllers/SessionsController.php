<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 08.12.17.
 * Time: 20:18
 */

namespace App\Http\Controllers;


use App\Patient;
use App\Session;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // show add new patient form
    public function addSessionForm()
    {
        return view('addsession');
    }
    public function addSessionFormPost(Request $request)
    {
        $id = $request->id;
        return view('addsession', ['id' => $id]);
    }
    //add new session
    public function addSession(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'max:2000',
        ]);
        $newsession = new Session();

        $newsession->patient_id = $request->id;
        $newsession->s_date = $request->date;
        $newsession->description = $request->description;

        $newsession->save();

        return redirect('sessionschedule');
    }
    // show edit new session form
    public function editSessionForm(Request $request)
    {
        $session = Session::where('id',$request->session_id)->get();
        $patient = array();
        foreach ($session as $psession) {
            $patient = Patient::where('id', $psession->patient_id)->get();
        }
        return view('editsession', ['session'=>$session,'patient'=>$patient]);
    }
    //edit session
    public function editSession(Request $request)
    {
        $request->validate([
            'session_id' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'max:2000',
        ]);
        Session::where('id',$request->session_id)->update(['s_date' => $request->date, 'description' => $request->description]);
        $session = Session::where('id',$request->session_id)->get();
        $patient = array();
        foreach ($session as $psession) {
            $patient = Patient::where('id', $psession->patient_id)->get();
        }
        return view('editsession', ['session'=>$session,'patient'=>$patient]);
    }
    //delete session
    public function deleteSession(Request $request)
    {
        Session::where('id',$request->session_id)->delete();
        return redirect('sessionschedule');
    }

    public function sessionSchedule()
    {
        $sessionlist = Session::select('sessions.id AS sid','patients.id AS pid', 's_date', 'description', 'name', 'lname')->join('patients', 'sessions.patient_id', '=', 'patients.id')->get();
        return view('sessionschedule', ['sessionlist' => $sessionlist]);
    }
    public function sessionSchedulePost(Request $request)
    {
        $request->validate([
        'date' => 'required|date',
    ]);
        $sessionlist = Session::select('sessions.id AS sid','patients.id AS pid', 's_date', 'description', 'name', 'lname')->whereDate('s_date', $request->date)->join('patients', 'sessions.patient_id', '=', 'patients.id')->get();
        return view('sessionschedule', ['sessionlist' => $sessionlist]);
    }
}