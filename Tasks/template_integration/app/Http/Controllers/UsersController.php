<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
                return redirect()->route('index');
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
}
