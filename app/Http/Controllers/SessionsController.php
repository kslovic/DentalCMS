<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 08.12.17.
 * Time: 20:18
 */

namespace App\Http\Controllers;

use Validator;
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
    public function addSessionFormPost(Request $request)
    {
        $id = $request->id;
        $patient = Patient::where('id', $id)->first();
        return view('addsession', ['id' => $id, 'name'=> $patient['name'], 'lname' => $patient['lname']]);
    }
    //add new session
    public function addSession(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make($request->all(),[
            'date' => 'required|date',
            'description' => 'max:2000',
        ]);
        if($validator->fails()){
            $patient = Patient::where('id', $id)->first();
            return view('addsession', ['id' => $id, 'name'=> $patient['name'], 'lname' => $patient['lname']]);
        }
        $newsession = new Session();

        $newsession->patient_id = $request->id;
        $newsession->s_date = $request->date;
        $newsession->description = $request->description;

        $newsession->save();

        $sessionlist = Session::select('sessions.id AS sid','patients.id AS pid', 's_date', 'description', 'name', 'lname')->join('patients', 'sessions.patient_id', '=', 'patients.id')->orderBy('s_date','desc')->simplePaginate(10);
        return view('sessionschedule', ['sessionlist' => $sessionlist, 'status' => "dodan"]);
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
        Session::where('id',$request->session_id)->update(['s_date' => date("Y-m-d H:i:s",strtotime($request->date)), 'description' => $request->description]);
        $session = Session::where('id',$request->session_id)->get();
        $patient = array();
        foreach ($session as $psession) {
            $patient = Patient::where('id', $psession->patient_id)->get();
        }
        return view('editsession', ['session'=>$session,'patient'=>$patient, 'edited' => true]);
    }
    //delete session
    public function deleteSession(Request $request)
    {
        Session::where('id',$request->session_id)->delete();
        $sessionlist = Session::select('sessions.id AS sid','patients.id AS pid', 's_date', 'description', 'name', 'lname')->join('patients', 'sessions.patient_id', '=', 'patients.id')->orderBy('s_date','desc')->simplePaginate(10);
        return view('sessionschedule', ['sessionlist' => $sessionlist, 'status' => "obrisan"]);
    }

    public function sessionSchedule()
    {
        $sessionlist = Session::select('sessions.id AS sid','patients.id AS pid', 's_date', 'description', 'name', 'lname')->join('patients', 'sessions.patient_id', '=', 'patients.id')->orderBy('s_date','desc')->simplePaginate(10);
        return view('sessionschedule', ['sessionlist' => $sessionlist]);
    }
    public function sessionSchedulePost(Request $request)
    {
        $request->validate([
        'date' => 'required|date',
    ]);
        $sessionlist = Session::select('sessions.id AS sid','patients.id AS pid', 's_date', 'description', 'name', 'lname')->whereDate('s_date', $request->date)->join('patients', 'sessions.patient_id', '=', 'patients.id')->orderBy('s_date','asc')->get();
        return view('sessionschedule', ['sessionlist' => $sessionlist, 'date' => $request->date]);
    }
}