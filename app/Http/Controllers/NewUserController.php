<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

class NewUserController extends Controller
{
    public function create(Request $request) {

        $adminUser = session('user');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4'
        ]);

        $newUser = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        Group::create([
            'member_id' => $newUser->id,
            'admin_id' => $adminUser->id,
            'create_permission' => $request->has('create'),
            'read_permission' => $request->has('read'),
            'update_permission' => $request->has('update'),
            'delete_permission' => $request->has('delete'),
        ]);     

        return redirect()->back()->with('success', 'New user created successfully!');
    }

    public function getGroupUsers() {
        $adminUser = session('user');
        $members = Group::where('admin_id', $adminUser->id)->get();

        $membersWithUser = $members->map(function ($member) {
            $user = User::find($member->member_id);

            $member->user_name = $user->name;
            $member->user_email = $user->email;

            return $member;
        });

        return view('users', ['members' => $membersWithUser]);
    }
}
