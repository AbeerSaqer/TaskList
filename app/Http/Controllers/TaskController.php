<?php
namespace App\Http\Controllers;
use illuminate\http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller{

    public function index(){

        $tasks= DB::table('tasks')->orderby('name')->get();
       // $tasks = Task::all();
        return view('tasks', compact('tasks'));


    }

    public function show($id){
        $task= DB::table('tasks')->find($id);
        return view('show',compact('task'));
    }


     public function store( Request $request  ){

    // $task= DB::table('tasks')->insert([
    //     'name'=> $_REQUEST['name'],
    //     'created_at'=> now(),
    //    'updated_at'=> now()
    //  ]);

     $task = new Task();
     $task->name = $_REQUEST['name'];
     $task->save();

    return redirect()->back();
    }

    public function delete($id){
        // DB::table('tasks')->where('id',$id)->delete();
        // return redirect()->back();

        Task::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        // $data= DB::table('tasks')->find($id);
        //$tasks= DB::table('tasks')->orderBy('name')->get();
         $data= Task::find($id);
         $tasks = Task::all()->sortBy('name');
         return view('edit',compact('data','tasks'));

    }

    public function update(Request $request , $id){
    //    $data = DB::table('tasks')-> where ('$id',$id) -> update(['name'=> $_REQUEST['name']]);
    //     $tasks = DB::table('tasks')->orderBy('name')->get();
    //     return view('tasks',compact('data','tasks'));


    // ،يوجد مشكلة في query builder
        $data = Task::find($id);
        $data->name = $_REQUEST['name'];
        $data->save();
        return redirect('/');
       return $request ->input();

    }

}


