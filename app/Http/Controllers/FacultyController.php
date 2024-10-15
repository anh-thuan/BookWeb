<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Gate;

class FacultyController extends Controller
{
    function add(){
        if(!Gate::allows('faculty/add')) {
            return view('error-404/error-404');
        }
        $faculties=Faculty::all(); 
        return view ('admin/faculty/add',compact('faculties'));
    }

    function store(Request $request){
        if(!Gate::allows('faculty/add')) {
            return view('error-404/error-404');
        }
        $request -> validate([
            'name'=>'required',
        ]);

        Faculty::Create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect('admin/faculty/add')->with('success','Faculty added successfully');
    }

    function delete($id){
        if(!Gate::allows('faculty/delete')) {
            return view('error-404/error-404');
        }
        Faculty::find($id)->forceDelete();
        return redirect('admin/faculty/add')->with('success','Faculty deleted successfully');
    }

    function edit($id){
        if(!Gate::allows('faculty/edit')) {
            return view('error-404/error-404');
        }
        $faculty=Faculty::find($id);
        $faculties=Faculty::all();
        return view('admin/faculty/edit',compact('faculty','faculties'));
    }

    function update(Request $request,$id){
        if(!Gate::allows('faculty/edit')) {
            return view('error-404/error-404');
        }
        $request -> validate([
            'name'=>'required',
        ]);

        Faculty::find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect('admin/faculty/add')->with('success','Faculty updated successfully');
    }
}
