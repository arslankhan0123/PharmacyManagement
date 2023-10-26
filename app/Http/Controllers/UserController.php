<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByRaw("FIELD(role, 'Admin', 'Doctor', 'User')")->orderBy('created_at', 'DESC')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Put values in session
        $credentials = [
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $redirect_url = [
            'url' => url('driver'),
        ];
        session()->put('redirect_url', $redirect_url);
        session()->put('credentials', $credentials);
        // Get session data
        $credentials = session('credentials');
        // Forget session value
        session()->forget('credentials');

        
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'user_role' => 'required',
        ];

        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'user_role.required' => 'User Role is required.',
        ];

        $validatedData = $request->validate($rules, $messages);


        $user = new User();
        $user->name =  $request->name;
        $user->email =  $request->email;
        $user->role =  $request->user_role;
        $user->password = Hash::make($request['paasword']);
        $user->save();
        return redirect('/User')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'user_role' => 'required',
        ];
        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'user_role.required' => 'User Role is required.',
        ];
        $validatedData = $request->validate($rules, $messages);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->user_role;
        $user->save();
        return redirect('/User')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/User')->with('error', 'User deleted successfully!');
    }
}
