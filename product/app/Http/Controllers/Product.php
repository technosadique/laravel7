<?php

namespace App\Http\Controllers;
use App\products;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class Product extends Controller
{
    function index(Request $req){
		
		if($req->searchtxt != ''){ 
			//$products=Products::where('name', 'LIKE', "%$req->searchtxt%")->paginate(10);
			$products = Products::where('name', 'LIKE', "%$req->searchtxt%")->sortable()->paginate(5);
		}
		else{
			//$products=Products::paginate(10);
			$products = Products::sortable()->paginate(5);
		}		
		//print_r($products); die;
		return view('list-view',['products'=>$products]);
	}
	
	function add(Request $req){		
		return view('add-product');
	}
	
	function edit(Request $req,$id){		
		$products=Products::where('id',$id)->get();
		//print_r($products[0]); die;
		return view('edit-product',['products'=>$products[0]]);
	}
	
	function delete(Request $req,$id){		
		$products=Products::where('id',$id)->delete();		
		return redirect('/')->with('success','Deleted successfully');
	}
	
	function update(Request $req){
		
		$this->validate($req,[
		'name'=>'required',
		'qty'=>'required',
		]);
		if($req->doc !=''){
			$fileName=time().'.'.$req->doc->extension();
			$req->doc->move(public_path('uploads'),$fileName);
			$products=['name'=>$req->name,'qty'=>$req->qty,'doc'=>$fileName];
		}
		else{
			$products=['name'=>$req->name,'qty'=>$req->qty];
		}
		
		Products::where('id',$req->id)->update($products);
		return redirect('/')->with('success','Updated successfully');	
	}
	
	function store(Request $req){
		
		$this->validate($req,[
		'name'=>'required',
		'qty'=>'required',
		'doc'=>'required',
		]);
		//print_r($req); die;		
		$fileName=time().'.'.$req->doc->extension();
		$req->doc->move(public_path('uploads'),$fileName);		
		$products=['name'=>$req->name,'qty'=>$req->qty,'doc'=>$fileName];
		Products::insert($products);
		return redirect('/')->with('success','Added successfully');	
	}
}