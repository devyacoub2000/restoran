<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class FrontController extends Controller
{
   
   public function store_booking(Request $request) {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date_time' => 'required',
            'num_guest' => 'required',
            'special_request' => 'required',
        ]);

       

        Book::create($request->all());
        return redirect()->route('front.index')
        ->with('msg', 'Request Reservation Done');
   }

   public function index() {
     return view('front_end.index');
   }

    public function about () {
        return view('front_end.about');
    }

    public function booking () {
        return view('front_end.booking');
    }

    public function contact () {
        return view('front_end.contact');
    }


    public function menue () {
        return view('front_end.menu');
    }

    public function service () {
        return view('front_end.service');
    }


    public function team () {
        return view('front_end.team');
    }


    public function testimonial () {
        return view('front_end.testimonial');
    }



























}
