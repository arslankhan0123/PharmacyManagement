<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\User;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::where('role', 'Doctor')->get();
        return view('admin.doctor.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctor.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ];
        
        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
        ];
        
        $validatedData = $request->validate($rules, $messages);
        

        $doctor = new User();
        $doctor->name =  $request->name;
        $doctor->email =  $request->email;
        $doctor->role =  'Doctor';
        $doctor->password = Hash::make($request['paasword']);
        $doctor->save();
        return redirect('/Doctor')->with('success', 'Doctor created successfully!');
    }

    public function edit($id)
    {
        $doctor = User::find($id);
        return view('admin.doctor.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ];
        
        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
        ];
        
        $validatedData = $request->validate($rules, $messages);
        

        $doctor = User::find($id);
        $doctor->name =  $request->name;
        $doctor->email =  $request->email;
        $doctor->role =  'Doctor';
        $doctor->password = Hash::make($request['paasword']);
        $doctor->save();
        return redirect('/Doctor')->with('success', 'Doctor updated successfully!');
    }

    public function delete($id)
    {
        $doctor = User::find($id);
        $doctor->delete();
        return redirect('/Doctor')->with('error', 'Doctor deleted successfully!');
    }
}
