<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    //

    function index() {
        $contacts = ContactMessage::latest()->simplePaginate(10);
        return view('admin.contactForm.index', compact('contacts'));
    }

    function create(Request $req) {
        $req->validate([
            'name' => 'required|string|min:3',
            'email' => 'email|required',
            'subject' => 'string|nullable',
            'message' => 'nullable'
        ]);

        ContactMessage::create([
            'name' => $req->name,
            'email' => $req->email,
            'subject'=> $req->subject,
            'message' =>$req->message
        ]);

        return redirect()->route('contact')->with('success', 'Email sended!');
    }

    function delete($id) {
        ContactMessage::find($id)->delete();
        return redirect()->route('contactMessage')->with('success', 'Message Deleted!');
    }

}
