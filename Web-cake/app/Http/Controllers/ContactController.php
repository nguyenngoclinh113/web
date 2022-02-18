<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index(Request $request){
    	$data = $request->all();
    	$contact = Contact::create($data);
        return redirect('/contact')->with('flash_message','Send Message Success !');
    }
}
