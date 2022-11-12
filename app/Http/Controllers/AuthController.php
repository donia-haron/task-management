<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    // show the login form
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    
    public function registration(Request $request){
  

                $email=$request->email;
                $password=$request->password;
                $user=new User();
                $user->email=$email;
                $user->password=Hash::make($password);
                $user->save();
                return redirect()->intended(route('dashboard'))->with('message','Welcome back !');
            
 
    }
    // authenticate the user
    public function authenticate(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return redirect()->route('auth.login')->withErrors($validators)->withInput();
        }else{
            $email=$request->email;
            $password=$request->password;

            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect()->intended(route('dashboard'))->with('message','Welcome back !');
            }else{
                return redirect()->route('auth.login')->with('message','Login failed !Email/Password is incorrect !');
            }
        }
    }

    public function logout(){  
        Auth::logout(); 
        return redirect()->route('auth.login')->with('success_message','Successfully Logged out !');       
    }
}
