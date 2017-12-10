<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 08.12.17.
 * Time: 20:18
 */

namespace App\Http\Controllers;


use App\Session;
use Illuminate\Support\Facades\Request;

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
    //add new session
    public function addSession(Request $request)
    {

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
        return view('sessionschedule');
    }

    // show session
    public function showSession(Request $request)
    {
        $session = Session::where('id',$request->id)->get();
        return view('showsession', $session);
    }
}