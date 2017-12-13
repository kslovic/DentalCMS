<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 08.12.17.
 * Time: 20:18
 */

namespace App\Http\Controllers;


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
        $session = Session::where('id',$request->id)->get();
        return view('addsession', $session);
    }
    //edit session
    public function editSession(Request $request)
    {

    }
    //delete session
    public function deleteSession(Request $request)
    {
        $session = Session::where('id',$request->id)->delete();
    }

    public function sessionSchedule()
    {
        $sessionlist = Session::join('patients', 'sessions.patient_id', '=', 'patients.id')->get();
        return view('sessionschedule', ['sessionlist' => $sessionlist]);
    }

    // show session
    public function showSession(Request $request)
    {
        $session = Session::where('id',$request->id)->get();
        return view('showsession', $session);
    }
}