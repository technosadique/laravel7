<?php

namespace App\Http\Controllers;
use App\Persons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PHPExcel;
use PHPExcel_IOFactory;

/*
use composer require mpdf/mpdf
use composer require phpoffice/phpexcel
*/

class Person extends Controller
{
   function index(Request $req){
	   $persons=Persons::paginate(5);
	   return view('list-view',['persons'=>$persons]);
   }
   
   function add(Request $req){
	  return view('add-person');
   }
   
   function edit(Request $req,$id){
	   $persons=Persons::where('id',$id)->get();
	   $persons=$persons[0];
	   return view('edit-person',['persons'=>$persons]);
   }
   
   function delete(Request $req,$id){
	  
	   Persons::where('id',$id)->delete();
	   return redirect('/')->with('success','Deleted successfully!');
   }
   
   function show(Request $req,$id){
	   $persons = Persons::leftjoin('department', 'persons.id', '=', 'department.user_id')
				->where('persons.id', $id) // Apply condition
				->select('persons.id','persons.name','persons.age','persons.doc','department.dept')
				->get();
				$persons=$persons[0];				
	   return view('view-person',['persons'=>$persons]);
   }
   
   function update(Request $req){
	   $this->validate($req,[
	   'name'=>'required|min:3',
	   'age'=>'required|min:2',
	   ]);
	   
	   if($req->doc!=''){
		   $files=time().'.'.$req->doc->extension();
		   $req->doc->move(public_path('uploads'),$files);
		   $persons=['name'=>$req->name,'age'=>$req->age,'doc'=>$files];
	   }
	   else{
		   $persons=['name'=>$req->name,'age'=>$req->age];
	   }
	   
	   
	   Persons::where('id',$req->id)->update($persons);
	   return redirect('/')->with('success','Updated successfully!');
   }
   
   function store(Request $req){
	   
	   $this->validate($req,[
	   'name'=>'required|min:3',
	   'age'=>'required|min:2',
	   ]);
	   
	   
	   if($req->doc!=''){
		   $files=time().'.'.$req->doc->extension();
		   $req->doc->move(public_path('uploads'),$files);
		   $persons=['name'=>$req->name,'age'=>$req->age,'doc'=>$files];
	   }
	   else{
		   $persons=['name'=>$req->name,'age'=>$req->age];
	   }
	   Persons::insert($persons);
	   return redirect('/')->with('success','Added successfully!');
   }
   
   public function generate_pdf(){
		//$persons = Persons::orderby('name','ASC')->get();
		$persons = Persons::leftjoin('department', 'persons.id', '=', 'department.user_id')				
				->select('persons.id','persons.name','persons.age','persons.doc','department.dept')
				->orderby('name','ASC')
				->get();		
		//print_r($persons); die;
		$html = view('sample-pdf-view',['persons'=>$persons]); 		
		$mpdf =new \Mpdf\Mpdf(['default_font' => 'A_Nefel_Botan']);			
		//$stylesheet = file_get_contents(BASE_URL.'public/assets/css/pdf.css'); // external css
		//$mpdf->WriteHTML($stylesheet,1);  
		$mpdf->WriteHTML($html);   
		$mpdf->Output("Persons_" . date("ymd") . ".pdf", 'I');
		exit;

	}
	
	 public function generate_csv(){       
		$report_data = Persons::leftjoin('department', 'persons.id', '=', 'department.user_id')				
				->select('persons.id','persons.name','persons.age','persons.doc','department.dept')
				->orderby('name','ASC')
				->get();		
		$f = fopen('php://memory', 'w'); // Set header
		$seq = 1;
        $header = ['Sl No.', 'Name', 'Age', 'Dept'];
		fputcsv($f, $header, ',');
		
		foreach ($report_data as $row) {
			$row_data = [	
                    $seq++,					
					($row['name']),					
					($row['age']),					
					($row['dept']),					
				];				
				// Generate csv lines from the inner arrays
				fputcsv($f, $row_data, ','); 
		}
		fseek($f, 0);
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="Post_Report' . '_' . date('dmy') . '.csv";');
		fpassthru($f);	
		
	} 
	
	
		/* public function generate_csv(){
		  
		  $object = new PHPExcel();

		  $object->setActiveSheetIndex(0);

		  $table_columns = array("Sl No.","Name","Age","Dept");

		  $column = 0;

		  foreach($table_columns as $field)
		  {
		   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
		   $column++;
		  }

		  $posts = Persons::leftjoin('department', 'persons.id', '=', 'department.user_id')				
				->select('persons.id','persons.name','persons.age','persons.doc','department.dept')
				->orderby('name','ASC')
				->get();

		  $excel_row = 2;

		  foreach($posts as $row)
		  {
		   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);
		   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->name);
		   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->age);
		   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->dept);
		   
		   $excel_row++;
		  }

		  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		  header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="Post_Data.xlsx"');
		  $object_writer->save('php://output');
		
	} */
}
