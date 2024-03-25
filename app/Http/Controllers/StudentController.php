<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class StudentController extends Controller
{
    public function index(){
        $data = Student::get();
        return view('frontend.index',compact('data'));
    }
    public function create(){
        $student = new Student();
        $title = "Create Student";
        $url = url('/student');
        $data =compact('student','title','url');
        return view('frontend.customer_form')->with($data);
    }
   public function store(Request $request){
     $request->validate([
        'name'=>'required|max:250',
        'email'=>'required|max:250|email',
        'password'=>'required',
                     'string',
                     'confirmed',
        'confirmed_password'=>'required|same:password',
     ]);
     Student::create([
       'name' => $request->name,
       'email' => $request->email,
       'password' => md5($request->password),
       'division' => $request->division,
       'upzilla' => $request->upzilla,
       'address' => $request->address,
       'gender' => $request->gender,
       'dob' => $request->dob,
     ]);

     return redirect()->back()->with('message','Student profile created successfully');
   }
   public function edit(int $id){
       $student = Student::findOrFail($id);
       $title = "Update Student";
       $url =url('/student/'.$id.'/update');
       $data = compact('student', 'title', 'url');

       return view('frontend.customer_form')->with($data);
       
   }
   public function update(Request $request, int $id){
    $student = Student::findOrFail($id);

    $request->validate([
        'name'=>'required|max:250',
        'email'=>'required|max:250|email',
     ]);
     $student->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => md5($request->password),
        'division' => $request->division,
        'upzilla' => $request->upzilla,
        'address' => $request->address,
        'gender' => $request->gender,
        'dob' => $request->dob,
     ]);

     return redirect()->back()->with('message','Student profile updated successfully');
   }

   public function delete($id){
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->back()->with('message','Student profile deleted successfully');
   }
}
