<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
class StudentsController extends Controller
{
    public function index(){
        return view('student.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'course'=>'required'
        ]);
        $model=new Students;
        $model->name=$request['name'];
        $model->course=$request['course'];
        $model->save();
        return response()->json([
            'status'=>200,
            'message'=>'student added successfully'
        ]);
    }
    public function fetch_students(){
        $students=Students::all();
        return response()->json([
            'students'=>$students]);

    }

    public function show($id){        
        $stud=Students::find($id);
        return view('student.show',['stud'=>$stud]);
    }
}
