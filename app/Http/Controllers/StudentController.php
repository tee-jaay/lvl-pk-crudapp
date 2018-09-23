<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
  public function index(){
    $students = Student::all();
    return view('welcome')->with(compact('students'));
  }

  public function create(){
    return view('create');
  }

  public function store(Request $request){
    // return Student::create($request->all());
    // return $request->all();
    $this->validate($request,[
      'firstname' =>  'required',
      'lastname' =>  'required',
      'email' =>  'required',
      'phone' =>  'required',
    ]);
    $student = new Student;

    $student->first_name  = $request->firstname;
    $student->last_name  = $request->lastname;
    $student->email  = $request->email;
    $student->phone  = $request->phone;

    $student->save();

    return redirect(route('home'))->with('successMsg','Student successfully added!');
  }
}
