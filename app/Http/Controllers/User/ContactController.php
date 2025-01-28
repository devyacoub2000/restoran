<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    
    public function store_contact(Request $request) {
        $request->validate([
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
        ]);

        Contact::create($request->all());
        return redirect()->route('front.contact')->with('msg', 'Request Contact Is Done..');
    }

    public function contact() {
        $data = Contact::latest('id')->paginate();
        return view('admin.contact', compact('data'));
    }
}
