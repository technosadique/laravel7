<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Books;


class BookController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }
    public function store(Request $request)
    { 
        $book = Books::create($request->all());
        return response()->json($book, 201);
    }
	
	public function getBookById($id)
    {
        $books = Books::find($id);
        return response()->json($books, 200);
    }
	
	public function destroy($id)
    {
        $books = Books::where('id',$id)->delete();
        return response()->json(['status'=>1,'msg'=>'Deleted succesfully'], 200);
    }
	
	public function UpdateBook(Request $request)
    {		
		$data=['title'=>$request->title,'author'=>$request->author,'description'=>$request->description];
        $books = Books::where('id',$request->id)->update($data);
        return response()->json(['status'=>1,'msg'=>'Updated succesfully'], 200);
    }	
}
