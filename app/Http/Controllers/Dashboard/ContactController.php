<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function insert(Request $request){
        $ct = new Contact();
        $ct->name = $request['name'];
        $ct->email = $request['email'];
        $ct->phone = $request['phone'];
        $ct->message = $request['message'];
        $ct->save();
        return redirect('/'); 
    }
}
