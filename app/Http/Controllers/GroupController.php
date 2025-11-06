<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroups() {
        $user = session('user');

        $group = Group::where('member_id', $user->id)->first();
        if ($group) {
            $groupContacts = Contact::where('user_id', $group->admin_id)->get();
            return view('groups', ['group'=>$group, 'groupContacts' => $groupContacts]);
        }

        return redirect('/contacts')->with('info', 'You are a parent user and do not belong to any group');
    }
}
