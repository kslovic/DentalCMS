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

class PatientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // show add new patient form
    public function addPatientForm()
    {
        return view('addpatient');
    }
    // add new patient
    public function addPatient(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|digits_between:9,15',
        ]);
        $patient = new Patient();

        $patient->name = $request->name;
        $patient->lname = $request->lastname;
        $patient->email = $request->email;
        $patient->phone = $request->phone;

        $patient->save();

        $patients = Patient::orderBy('lname','asc')->simplePaginate(10);
        return view('patientlist', ['patients' => $patients, 'status' => "dodan"]);
    }
    // show edit new patient form
    public function editPatientForm(Request $request)
    {
        $patient = Patient::where('id',$request->id)->get();
        return view('addpatient', ['patients'=>$patient]);
    }
    // edit existing patient
    public function editPatient(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|digits_between:9,15',
        ]);
        Patient::where('id',$request->id)->update(['name' => $request->name, 'lname' => $request->lastname, 'email' => $request->email, 'phone' =>$request->phone]);
        $patient = Patient::where('id',$request->id)->get();
        $sessions = Session::where('patient_id',$request->id)->get();
        return view('patientprofile', ['patients'=>$patient, 'sessionlist'=>$sessions]);
    }
    // delete patient
    public function deletePatient(Request $request)
    {
        Patient::where('id',$request->id)->delete();
        $patients = Patient::orderBy('lname','asc')->simplePaginate(10);
        return view('patientlist', ['patients' => $patients, 'status' => "obrisan"]);
    }

    public function patientProfile(Request $request)
    {
        $patient = Patient::where('id',$request->id)->get();
        $sessions = Session::where('patient_id',$request->id)->get();
        return view('patientprofile', ['patients'=>$patient, 'sessionlist'=>$sessions]);
    }

    public function patientList()
    {
        $patients = Patient::orderBy('lname','asc')->simplePaginate(10);
        return view('patientlist', ['patients' => $patients]);
    }
    public function patientListPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
        ]);
        $name = $request->name;
        $lname = $request->lastname;
        $patients = Patient::where('name',$name)->where('lname',$lname)->get();
        return view('patientlist', ['patients' => $patients, 'name' => $name, 'lname' => $lname]);
    }




}