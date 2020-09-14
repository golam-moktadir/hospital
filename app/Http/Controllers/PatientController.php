<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
class PatientController extends Controller
{
    public function patient(){
    	$patients = Patient::all();
    	return view('admin.patients.patient-new',['patients' => $patients]);
    }
    public function createPatient(Request $request){
    	$request->validate([
    						'patient_name' => 'required', 
    						'father_name' => 'required', 
    						'age' => 'required',
    						'mobile' => 'required',
    						'address' => 'required'
    					]);
		if($request->submit){    	
	    	$value = new Patient;
	    	$value->patient_name = $request->patient_name;
	    	$value->father_name = $request->father_name;
	    	$value->age = $request->age;
	    	$value->mobile = $request->mobile;
	    	$value->address = $request->address;
	    	$value->save();
	    	return back()->with('success', 'New Patient Inserted Successfully');
	    }
	    else{
	    	$value = Patient::find($request->id);
	    	$value->patient_name = $request->patient_name;
	    	$value->father_name = $request->father_name;
	    	$value->age = $request->age;
	    	$value->mobile = $request->mobile;
	    	$value->address = $request->address;
	    	$value->save();
	    	return redirect()->route('patient')->with('success', 'Patient Info Updated Successfully');
	    }
    }
    public function editPatient($id){
    	$patients = Patient::all();
    	$patient = Patient::find($id);
    	return view('admin.patients.patient-edit', ['patients' => $patients, 'patient' => $patient]);
    }
    public function deletePatient($id){
    	$patient = Patient::find($id);
    	$patient->delete();
    	return redirect()->route('patient')->with('success', 'One Patient Deleted Successfully');
    }
}
