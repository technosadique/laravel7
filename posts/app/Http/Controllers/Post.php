<?php

namespace App\Http\Controllers;
use App\Posts;
use Illuminate\Http\Request;

class Post extends Controller
{
    
	
	function index(Request $req){
		
		$posts = Posts::orderby('title','DESC')->paginate(5);
		return view('list-view',['posts'=>$posts]);		
	}
	
	function create(Request $req){		
		return view('add-post');		
	}
	
	function edit(Request $req,$id){
		$posts=Posts::where('id',$req->id)->get();
		$posts=$posts[0];
		return view('edit-post',['posts'=>$posts]);
	}
	
	function update(Request $req){
		$this->validate($req,[
		'title'=>'required',		
		]);
		$data=['title'=>$req->title];
		$posts=Posts::where('id',$req->id)->update($data);	
		return redirect('/')->with('success','Updated successfully');	
	}
	
	function store(Request $req){
		
		$this->validate($req,[
		'title'=>'required',		
		]);
		
		$data=['title'=>$req->title];
		$posts=Posts::insert($data);
		return redirect('/')->with('success','Added successfully');
	}
	
	function destroy(Request $req,$id){
		
		$posts=Posts::where('id',$req->id)->delete();
		return redirect('/')->with('success','Deleted successfully');
	}	
	
}
