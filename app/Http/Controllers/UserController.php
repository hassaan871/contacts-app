<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers()
    {
        $role = Role::where('name', 'User')->with('permissions')->first();
        $permissions = $role->permissions;

        $adminId = session('user');
        $users = User::where('created_by', $adminId->id)->get();

        return view('users', ['permissions' => $permissions, 'users' => $users]);
    }

    public function updateContactsPermission(Request $request)
    {
        $role = Role::where('name', 'User')->first();
        $selectedPermissions = $request->input('permissions', []);

        $permissionIds = Permission::whereIn('name', $selectedPermissions)->pluck('id')->toArray();
        $role->permissions()->sync($permissionIds);

        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }

    public function create(Request $request)
    {
        $admin = session('user');
        $isAdmin = $request->has('isAdmin') ? 1 : 0;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_by' => $admin->id,
            'role_id' => $isAdmin ? 1 : 2,
        ]);

        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function deleteUser($id)
    {
        $isDeleted = User::destroy($id);
        if ($isDeleted) {
            return redirect('/users');
        }
    }

    public function editUserForm($id)
    {
        $user = User::find($id);
        return view('editUser', ['user' => $user]);
    }

    public function editUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->role_id = $request->has('isAdmin') ? 1 : 2;

        if ($user->save()) {
            return redirect('/contacts');
        } else {
            return "Operation failed successfully";
        }
    }
}
