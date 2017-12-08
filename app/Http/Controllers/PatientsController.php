<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 08.12.17.
 * Time: 20:18
 */

namespace App\Http\Controllers;


use App\Patient;
use Illuminate\Support\Facades\Request;

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

    }
    // show edit new patient form
    public function editPatientForm(Request $request)
    {
        $patient = Patient::where('id',$request->id)->get();
        return view('addpatient', $patient);
    }
    // edit existing patient
    public function editPatient(Request $request)
    {

    }
    // delete patient
    public function deletePatient(Request $request)
    {
        $patient = Patient::where('id',$request->id)->delete();
    }
    // show patient
    public function showPatient(Request $request)
    {
        $patient = Patient::where('id',$request->id)->get();
        return view('showpatient', $patient);
    }


}