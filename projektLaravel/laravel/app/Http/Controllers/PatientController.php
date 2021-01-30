<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;

class PatientController extends Controller
{
    public function index(UserRepository $userRepo) {
 	
    	$users = $userRepo->getAllPatients();

    	return view('patients.list', ["patientsList"=>$users, 
    								"footerYear"=>date("Y"),
    								"title"=>"Moduł pacjentów"
    	]);
    }

    public function show(UserRepository $userRepo, $id) {
  	
    	$patient = $userRepo->find($id);

    	return view('patients.show', ["patient"=>$patient, 
    								"footerYear"=>date("Y"),
    								"title"=>"Moduł pacjentów"
    	]);
    }
}
