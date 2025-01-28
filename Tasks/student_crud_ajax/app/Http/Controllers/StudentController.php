<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Student;
class StudentController extends Controller
{
    public function index(){
       
        return view('students.index');
    }

    public function fetchstudents(Request $request){
        if(isset($request->id)){
            $students = DB::table('students')->where('id',$request->id)->get();
        }else{
            $students = DB::table('students')->get();
        }
       
        return response()->json($students);
    }

    public function store(Request $request)
    {
         $img = $request->file('avatar');
         $file = '';
        if($img)
        {
            $path = 'images/';
            $file = time().'.'.$img->getClientOriginalExtension();
            $img->move($path, $file);
        }

        if(isset($request->id)){
            $data = ['fname'=>$request->fname,'lname'=>$request->lname,'email'=>$request->email,'post'=>$request->post,'avatar'=>$file];
            DB::table('students')->where('id', $request->id)->update($data);
        }else{
            $data = ['fname'=>$request->fname,'lname'=>$request->lname,'email'=>$request->email,'post'=>$request->post,'avatar'=>$file];
            Student::create($data);
        }
        return response()->json(['success'=>'200']);
        
    }

    public function deletestudents(Request $request){
        if(isset($request->id)){
            DB::table('students')->where('id',$request->id)->delete();
        }
       
        return response()->json(['success'=>'200']);
    }
}
