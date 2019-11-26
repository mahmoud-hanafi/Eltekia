<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactus;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // 
    }
    public function about()
    {
        return view('pages.about');
    }

    public function home()
    {
        return view('pages.home');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function dosend(Request $request)  
    {
        $request->validate([
            'name'=>'required' ,
            'email'=>'required|email' ,
            'subject'=>'required' ,
            'body'=>'required|min:20'
        ]);

        $name = $request->name;
        $email= $request->email;
        $subject= $request->subject;
        $body= $request->body;
        
        Mail::to('hhanfy626@gmail.com')->send( new contactus($name,$email,$subject,$body));

        return redirect('/contact')->with('success' , 'we got your Message and we will answer You');
    }
}
