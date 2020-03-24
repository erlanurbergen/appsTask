<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class StudentController extends Controller
{
    public function index(){
        $students = Students::paginate(5);
        return view('welcome', compact('students'));//Создает массив, содержащий переменные и их значения.
    }


    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'firstname'=>'required', // для валидации
            'lastname'=>'required',
            'email'=>'required',
            'phonenumber'=>'required'
        ]);
    $student = new Students;
    $student->first_name = $request->firstname;
    $student->last_name = $request->lastname;
    $student->email = $request->email;
    $student->phone = $request->phonenumber;
    $student->save();

    return redirect(route('home'))->with('successMsg', 'Student Successfully Added');
    }

    public function edit($id){
        $student = Students::find($id);
        return view('edit',compact('student'));
    }

    public function update(Request $req, $id){
        $this->validate($req,[
            'firstname'=>'required', // для валидации
            'lastname'=>'required',
            'email'=>'required',
            'phonenumber'=>'required'
        ]);
        $student = Students::find($id);
        $student->first_name = $req->firstname;
        $student->last_name = $req->lastname;
        $student->email = $req->email;
        $student->phone = $req->phonenumber;
        $student->save();

        return redirect(route('home'))->with('successMsg', 'Student Successfully Updated');

    }

    public function delete($id){
        Students::find($id)->delete();
        return redirect(route('home'))->with('successMsg', 'Student Delete Successfully ');

    }
}
