<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::all();
        return view('admin.page.contact.list',['contact'=>$contact]);
    }
}
