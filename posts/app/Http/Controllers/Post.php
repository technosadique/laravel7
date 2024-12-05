<?php

namespace App\Http\Controllers;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PHPExcel;
use PHPExcel_IOFactory;

class Post extends Controller
{    
	
	function index(Request $req){		
		
		$posts = posts::sortable()->paginate(50);		
		//$posts = posts::onlyTrashed()->sortable()->paginate(50);  // get all deleted records
		//$posts = posts::withTrashed()->sortable()->paginate(50);  // get all deleted and non deleted records
		return view('list-view',['posts'=>$posts]);	
        //dd($data);


	}
	
	function create(Request $req){		
		return view('add-post');		
	}
	
	function edit(Request $req,$id){
		//$posts=Posts::where('id',$req->id)->get();
		//$posts=$posts[0];
		$posts=DB::table('posts')->where('id',$req->id)->first();
		//$posts=$posts[0];
		return view('edit-post',['posts'=>$posts]);
	}
	
	function update(Request $req){
		$this->validate($req,[
		'title'=>'required',		
		]);
		$data=['title'=>$req->title];
		$posts=DB::table('posts')->where('id',$req->id)->update($data);	
		return redirect('/')->with('success','Updated successfully');	
	}
	
	function store(Request $req){
		
		$this->validate($req,[
		'title'=>'required',		
		]);
		
		$data=['title'=>$req->title];
		//$posts=Posts::insert($data);
		$posts=DB::table('posts')->insert($data);	
		return redirect('/')->with('success','Added successfully');
	}
	
	function destroy(Request $req,$id){	
        //DB::table('posts')->where('id', $req->id)->update(['deleted_at' => now()]);	
		$posts=Posts::where('id',$req->id)->delete();
		return redirect('/')->with('success','Deleted successfully');
	}
	
	function setsession(){
		session()->put('username','PETER');
	}
	function getsession(){
		echo session()->get('username');
	}
	function deletesession(){
		 session()->forget('username');
	}
	
	public function generate_pdf(){
		$posts = Posts::orderby('title','DESC')->get();
		$html = view('sample-pdf-view',['posts'=>$posts]); 		
		$mpdf =new \Mpdf\Mpdf(['default_font' => 'A_Nefel_Botan']);			
		//$stylesheet = file_get_contents(BASE_URL.'public/assets/css/pdf.css'); // external css
		//$mpdf->WriteHTML($stylesheet,1);  
		$mpdf->WriteHTML($html);   
		$mpdf->Output("post_" . date("ymd") . ".pdf", 'I');
		exit;

	}
	
	/* public function generate_csv(){       
		$report_data = Posts::orderby('title','DESC')->get();		
		$f = fopen('php://memory', 'w'); // Set header
		$seq = 1;
        $header = ['Sl No.', 'Title'];
		fputcsv($f, $header, ',');
		
		foreach ($report_data as $row) {
			$row_data = [	
                    $seq++,					
					($row['title'])					
				];				
				// Generate csv lines from the inner arrays
				fputcsv($f, $row_data, ','); 
		}
		fseek($f, 0);
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="Post_Report' . '_' . date('dmy') . '.csv";');
		fpassthru($f);	
		
	} */
	
	public function download_csv(){
		  
		  $object = new PHPExcel();

		  $object->setActiveSheetIndex(0);

		  $table_columns = array("Title");

		  $column = 0;

		  foreach($table_columns as $field)
		  {
		   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
		   $column++;
		  }

		  $posts = Posts::orderby('title','DESC')->get();

		  $excel_row = 2;

		  foreach($posts as $row)
		  {
		   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->title);
		   
		   $excel_row++;
		  }

		  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		  header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="Post_Data.xlsx"');
		  $object_writer->save('php://output');
		
	}
	
}
