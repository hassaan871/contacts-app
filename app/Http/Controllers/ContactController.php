<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function createNewContact(Request $request)
    {
        $user = session('user');
        Contact::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect('/contacts')->with('success', 'Contact Added successfully');
    }

    public function contactsList()
    {
        $user = session('user');
        $contacts = Contact::where('user_id', $user->id)->get();
        return view('/contacts', ['contacts' => $contacts]);
    }

    public function deleteContact($id)
    {
        $isDeleted = Contact::destroy($id);
        if ($isDeleted) {
            return redirect('/contacts');
        }
    }

    public function editContactForm($id)
    {
        $contact = Contact::find($id);
        return view('editContact', ['contact' => $contact]);
    }

    public function editContact(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;

        if ($contact->save()) {
            return redirect('/contacts');
        } else {
            return "Operation failed successfully";
        }
    }

    public function search(Request $request) {
        $user = session('user');
        $contacts = Contact::where('user_id',$user->id)->where('name','like',"%{$request->search}%")->get();
        return view('contacts', ['contacts'=>$contacts, 'search'=>$request->search]);
    }
}
