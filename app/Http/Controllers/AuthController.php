<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Signup(Request $request)
    {

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($user) {
            return redirect('/login');
        } else {
            return "User Not Created Successfully";
        }
    }

    public function Login(Request $request)
    {

        $user = User::where('name', $request->username)->first();

        if (!$user) {
            return redirect()->back()->with('error-username', 'Invalid Username')->withInput();
        }

        if (Hash::check($request->password, $user->password)) {
            session(['user' => $user]);
            return redirect('/contacts');
        } else {
            return redirect()->back()->with('error-password', 'Invalid Password')->withInput();
        }
    }
}
