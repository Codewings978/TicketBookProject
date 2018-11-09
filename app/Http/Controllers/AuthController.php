<?php

namespace BookTheTicket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use BookTheTicket\User;
use Auth;

class AuthController extends Controller
{
    public function getSignUp(){
        
        return view('auth.signup');
    }
    
    public function postSignUp(Request $request){
        
    $this->validate( $request,
     [
         'email' => 'required|max:255',
         'username' => 'required|max:20',
         'password' => 'required|min:6',
        
     ],
     array('required' => 'Fill your account :attribute .',));
        
        $type = false;
        if($request->input('type') == '1'){
             $type = true;
            
        }
        $exist = User::where('email',$request->input('email'))->first();
        
        if(empty($exist)){
            
          $users = new User();
          $users->username=$request->input('username');
          $users->password= Hash::make($request->input('password'));
          $users->email=$request->input('email');
          $users->is_studio=$type;
          $users->save();    
  
        }
        
        return redirect()->route('Login')->with('info', 'Your account is created successfully. Please login to continue..');
        
    }
    
    
    public function getSignIn(){
        
        return view('auth.signin');
    }
    
    public function postSignIn(Request $request){
        
     $this->validate( $request,
     [
         'email' => 'required',
         'password' => 'required',
        
     ],
     array('required' => 'Fill your account :attribute .',));
        

        if(!Auth::attempt( [
          'email' => $request->input('email'),
          'password' => $request->input('password')
            ])){
             
                return Redirect()->route('Login')->with('error', 'Could not sign you in with those details!');
            }
  
        return redirect()->route('Home')->with('info', 'Welcome, You are now logged in');
            
    }
    
    public function userSignOut(){
        Auth::logout();
        
        return redirect('/');
      
    }
}
