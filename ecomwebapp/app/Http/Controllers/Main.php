<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Users;


class Main extends Controller
{
    
	
	function login(){		
		return view('login-view');
	}
	
	function loginuser(Request $req){
		$this->validate($req,[
		'email'=>'required',
		'password'=>'required',
		]);
		//echo $req->email.'  '.$req->password; die;
		$user=Users::where('email',$req->email)->where('password', $req->password)->first();		
		//print_r($user->id); die;
		if(!empty($user)){
			Session::put('user_id', $user->id);
			Session::put('user_fullname', ucfirst($user->fullname));
			// $userId = Session::get('user_id');
			//if (Session::has('user_id')) {
				// Do something
			//}
			// Session::forget('user_id');
			return redirect('/dashboard');
		}
		else{ 
			return redirect('/')->with('error','Email/Password is incorrect');			
		}		
	}
	
	
	function dashboard(){
        
		return view('dashboard-view');
	}
	
	function register(){
		return view('register-view');
	}
	
	function registeruser(Request $req){
		$this->validate($req,[
		'fullname'=>'required',
		'email'=>'required',
		'password'=>'required',
		]);
		
		//$data=['fullname'=>$req->fullname,'email'=>$req->email,'password'=>$req->password];
		//$user=Users::insert($data);
		
		$newUser=new Users();
		$newUser->fullname=$req->fullname;
		$newUser->email=$req->email;
		$newUser->password=$req->password;
		
		if($newUser->save()){
			return redirect('/')->with('success','Registration is successfull!');		
		}
		else{
			return redirect('/')->with('error','Sorry');
		}
		
				
	}
	
	function logout(){
		
		Session::forget('user_id');
		Session::forget('user_fullname');
		return redirect('/');
	}
}
