<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{
    public function index(UserRepository $userRepo) {

        $statistics = $userRepo->getDoctorsStatistics();
    	
    	$users = $userRepo->getAllDoctors();

    	return view('doctors.list', ["doctorsList"=>$users, 
    								"footerYear"=>date("Y"),
    								"title"=>"Moduł lekarzy",
                                    "statistics"=>$statistics
    	]);
    }

    public function listBySpecialization(UserRepository $userRepo, $id) {

        $statistics = $userRepo->getDoctorsStatistics();
        
        $users = $userRepo->getDoctorsBySpecialization($id);

        return view('doctors.list', ["doctorsList"=>$users, 
                                    "footerYear"=>date("Y"),
                                    "title"=>"Moduł lekarzy",
                                    "statistics"=>$statistics
        ]);
    }



    public function show(UserRepository $userRepo, $id) {
    	
    	$doctor = $userRepo->find($id);

    	return view('doctors.show', ["doctor"=>$doctor, 
    								"footerYear"=>date("Y"),
    								"title"=>"Moduł lekarzy"
    	]);
    }

    public function create() {
    	
    	$specialization = Specialization::all();

    	return view('doctors.create', ["specializations" => $specialization, "footerYear"=>date("Y")]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'phone' => 'required',
            'address' => 'required',
            'pesel' => 'required'
        ]);
        
        $doctor = new User;
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->password = bcrypt($request->input('password'));
        $doctor->phone = $request->input('phone');
        $doctor->address = $request->input('address');
        $doctor->pesel = $request->input('pesel');
        $doctor->status = $request->input('status');
        $doctor->type = 'doctor';
        $doctor->save();

        $doctor->specializations()->sync($request->input('specializations'));

        return redirect()->action('App\Http\Controllers\DoctorController@index');
    }

    public function edit(UserRepository $userRepo, $id) {
    	
    	$doctor = $userRepo->update(["name" => "Jordan Michael Alex"], $id);

    	return redirect('doctors');
    	
    }

    public function delete(UserRepository $userRepo, $id) {
        
        $doctor = $userRepo->delete($id);

        return redirect('doctors');
        
    }
}
