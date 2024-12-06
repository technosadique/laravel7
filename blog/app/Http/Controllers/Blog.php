<?php

namespace App\Http\Controllers;
use App\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Blog extends Controller
{  
   
   function index(){	   
        $blogs = blogs::sortable()->paginate(10);		
		//$blogs = blogs::onlyTrashed()->sortable()->paginate(50);  // get all deleted records
		//$blogs = blogs::withTrashed()->sortable()->paginate(50);  // get all deleted and non deleted records
		return view('list-blog',['blogs'=>$blogs]);	
   }
   
    function create(){	   
	   return view('add-blog');
   }
   
   function store(Request $req){	   
	   
	   $this->validate($req,[
			'title' =>'required',
			'img'=>'required',
			/* 'title' => [
				'required',
				'string',
				'min:6',             // must be at least 6 characters in length
				'regex:/[a-z]/',      // must contain at least one lowercase letter
				'regex:/[A-Z]/',      // must contain at least one uppercase letter
				'regex:/[0-9]/',      // must contain at least one digit
				'regex:/[@$!%*#?&]/', // must contain a special character
			], */		
		]		
		);
	   
	   $fileName=time().'.'.$req->img->extension();
	   $req->img->move(public_path('uploads'),$fileName);	   
	   $data=['title' => $req->title, 'img' => $fileName];	   
	   DB::table('blogs')->insert($data);
	   
	   return redirect('/')->with('success','Added successfully!');
   }
   
   function edit(Request $req,$id){	   	   
	   $blogs = DB::table('blogs')->where('id',$id)->first();	   
	   return view('edit-blog',['blogs'=>$blogs]);
   }
   
   function update(Request $req){
	   
	   $this->validate($req,[
	   'title' =>'required',
			/* 'title' => [
				'required',
				'string',
				'min:6',             // must be at least 6 characters in length
				'regex:/[a-z]/',      // must contain at least one lowercase letter
				'regex:/[A-Z]/',      // must contain at least one uppercase letter
				'regex:/[0-9]/',      // must contain at least one digit
				'regex:/[@$!%*#?&]/', // must contain a special character
			] */			
		]);   
	   
	   if($req->img !=''){
		   $fileName=time().'.'.$req->img->extension();
		   $req->img->move(public_path('uploads'),$fileName);
		   $data=['title' => $req->title, 'img' => $fileName];
	   }
	   else{
		   $data=['title' => $req->title];
	   }
	   
	   DB::table('blogs')->where('id',$req->blog_id)->update($data);	   
	   return redirect('/')->with('success','Updated successfully!');
   }
   
   function delete(Request $req,$id){	   
	     DB::table('blogs')->where('id', $req->id)->update(['deleted_at' => now()]);
		//$blogs=blogs::where('id',$req->id)->delete();
	   return redirect('/')->with('success','Deleted successfully!');
   }  
   
}