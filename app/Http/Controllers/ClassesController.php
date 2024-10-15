<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Classes;
use App\Models\User;
use App\Models\Semester;
use App\Models\Faculty;

class ClassesController extends Controller
{
    function list(){
        if(!Gate::allows('class/list')) {
            return view('error-404/error-404');
        }
        $coordinatorclass=Classes::all();
        return view('admin/class/list',compact('coordinatorclass'));
    }

    function add(){
        if(!Gate::allows('class/add')) {
            return view('error-404/error-404');
        }
        $users= User::whereHas('role', function ($query) {
            $query->where('name', 'COORDINATOR');
        })->get();
        $semesters = Semester::all();

        //Temporary
        $faculties = Faculty::all();
        return view('admin/class/add',compact('users','semesters','faculties'));
    }

    function store(Request $request)
    {
        if(!Gate::allows('class/add')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name' => 'required',
            'key' => 'nullable',
            'user_id' => 'required|exists:users,id', 
            'semester_id' => 'required',
            'faculty_id' => 'required',
        ]);

        Classes::create([
            'name' => $request->name,
            'key' => $request->key,
            'user_id' => $request->user_id, 
            'semester_id' => $request->semester_id,
            'faculty_id' => $request->faculty_id, 
            'description' => $request->description,
        ]);

        return redirect('admin/class/list')->with('success', 'Class added successfully');  
    }

    function delete($id){
        if(!Gate::allows('class/delete')) {
            return view('error-404/error-404');
        }

        Classes::find($id)->forceDelete();
        return redirect('admin/class/list')->with('success', 'Class deleted successfully');
    }

    function edit($id){
        if(!Gate::allows('class/edit')) {
            return view('error-404/error-404');
        }

        $class=Classes::find($id);
        $users= User::whereHas('role', function ($query) {
            $query->where('name', 'coordinator');
        })->get();
        $semesters = Semester::all();

        //Temporary
        $faculties = Faculty::all();
        return view('admin/class/edit',compact('class','users','semesters','faculties'));
    }

    function update(Request $request, $id){
        if(!Gate::allows('class/edit')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name' => 'required',
            'key' => 'nullable',
            'user_id' => 'required', 
            'semester_id' => 'required',
            'faculty_id' => 'required',
        ]);
    
        Classes::where('id', $id)->update([
            'name' => $request->name,
            'key' => $request->key,
            'user_id' => $request->user_id,
            'semester_id' => $request->semester_id,
            'faculty_id' => $request->faculty_id,
            'description' => $request->description, 
        ]);
        // return dd($request->all()); 
        return redirect('admin/class/list')->with('success', 'Class updated successfully');
    }
}
