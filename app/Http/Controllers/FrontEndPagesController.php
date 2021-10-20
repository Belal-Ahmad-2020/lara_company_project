<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Image;
use Illuminate\Http\Request;

class FrontEndPagesController extends Controller
{
    //

    // portfolio page
    function portfolio() {
        $images = Image::latest()->simplePaginate(10);
    return view('pages.portfolio', compact('images'));
        
    }


    // contact Infromation 
    function contactInfo() {
        $contact = Contact::first();
        return view('pages.contact', compact('contact'));
    }


    
}
