<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contacts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function login()
    {
        return view('users.login');
    }

    public function register()
    {
        return view('users.register');
    }

    public function about()
    {
        return view('users.about');
    }

    public function contact()
    {
        return view('users.contact');
    }

    public function shop()
    {
        return view('users.shop');
    }

    public function shop_single()
    {
        return view('users.shop-single');
    }

    public function userlogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                session()->put('loginEmail',$user->email);
                return redirect()->route('dashboard');
            }else{
                return back()->with('error','Password do not match !!');
            }
        }else{
            return back()->with('error','Email do not match !!');
        }
       // return redirect()->route('login')->with('success','Login successfully!!');
    }

    public function useregister(Request $request){
         $request->validate([
             'username'=>'required',
             'useremail'=>'required',
             'userpassword'=>'required'
         ]);

       // print_r($request);exit;
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->useremail;
        $user->password = Hash::make($request->userpassword);

        $user->save();

        return redirect()->route('register')->with('success','User registered successfully!!');
        
    }

    public function logout(){
        session()->pull('loginEmail');
        return redirect()->route('login');
    }

    public function dashboard(){
        return view('users.dashboard');
    }

    public function Contact_register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'

        ]);

        $contact = new Contacts();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        $toMail = $request->email;
        $subject =  $request->subject;
        $chkmail = Mail::to($toMail)->send(new WelcomeEmail($request->message,$subject));

        return back()->with('success','Thank you for filling out your information!');
    }
}
