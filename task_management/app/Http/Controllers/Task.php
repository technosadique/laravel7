<?php

namespace App\Http\Controllers;
use App\Tasks;
use App\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Task extends Controller
{
   function index(Request $req){
	   $tasks=Tasks::orderByRaw("FIELD(priority, 'high', 'medium', 'low')")->paginate(5);
	   //$tasks=Tasks::orderBy('position')->paginate(5);
       $projects=Projects::all();
	   $selectedProject = $req->project_id;
	   if ($selectedProject) { 
        //$tasks->where('project_id', $selectedProject);
		$tasks=Tasks::where('project_id', $selectedProject)->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")->paginate(5);
	      //$tasks=Tasks::where('project_id', $selectedProject)->orderBy('position')->paginate(5);
		}
	   return view('task/list-view',['tasks'=>$tasks,'projects'=>$projects,'selectedProject'=>$selectedProject]);
   }
   
   function add(Request $req){
	  $projects=Projects::all();
	  return view('task/add-task',['projects'=>$projects]);
   }
   
   function edit(Request $req,$id){
	   $tasks=Tasks::where('id',$id)->get();
	   $projects=Projects::all();
	   
	   $tasks=$tasks[0];	   
	   return view('task/edit-task',['tasks'=>$tasks,'projects'=>$projects]);
   }
   
   function delete(Request $req,$id){
	  
	   Tasks::where('id',$id)->delete();
	   return redirect('/')->with('success','Task deleted successfully!');
   }   
   
   function update(Request $req){
	   $this->validate($req,[
	   'name'=>'required|min:3',
	   'priority'=>'required',
	   'project_id'=>'required',
	   ]);	  
	   
	    $tasks=['name'=>$req->name,'priority'=>$req->priority,'project_id'=>$req->project_id];
	   Tasks::where('id',$req->id)->update($tasks);
	   return redirect('/')->with('success','Task updated successfully!');
   }
   
   function store(Request $req){	   
	   $this->validate($req,[
	   'name'=>'required|min:3',	   
	   'priority'=>'required', 
	   'project_id'=>'required', 
	   ]);   
	  
	   $tasks=['name'=>$req->name,'priority'=>$req->priority,'project_id'=>$req->project_id];
	   Tasks::insert($tasks);
	   return redirect('/')->with('success','Task added successfully!');
   }
   
	function reorder(Request $req)
{
    $order = $req->order;

    $priorityLevels = ['high', 'medium', 'low'];

    foreach ($order as $index => $taskId) {
        $priority = $priorityLevels[$index] ?? 'low'; // If more tasks, default to 'low'
        
        Tasks::where('id', $taskId)->update([
            'priority' => $priority,
        ]);
    }

    return response()->json(['status' => 'success']);
}
	
}
