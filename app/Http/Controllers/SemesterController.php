<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use DateTime;
use Illuminate\Support\Facades\Gate;

class SemesterController extends Controller
{
    function add(){
        if(!Gate::allows('semester/add')) {
            return view('error-404/error-404');
        }
        $semesters=Semester::all();
        return view('admin/semester/add',compact('semesters'));
    }

    function store(Request $request)
    {
        if(!Gate::allows('semester/add')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => ['required', 'after_or_equal:start_date']
        ]);
    
        // Set the timezone
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    
        // Create DateTime objects with the specified timezone
        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);
    
        // Store the semester with timezone information
        Semester::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $start_date->format('Y-m-d H:i:s'),
            'end_date' => $end_date->format('Y-m-d H:i:s')
        ]);
    
        return redirect('admin/semester/add')->with('success', 'Semester added successfully');
    }
    

    function delete($id){
        if(!Gate::allows('semester/delete')) {
            return view('error-404/error-404');
        }

        Semester::find($id)->forceDelete();
        return redirect('admin/semester/add')->with('success','Semester deleted successfully');
    }

    function edit(Request $request, $id){
        if(!Gate::allows('semester/edit')) {
            return view('error-404/error-404');
        }

        $semester=Semester::find($id);
        $semesters=Semester::all();
        return view('admin/semester/edit',compact('semester','semesters'));
    }

    function update(Request $request, $id)
    {
        if(!Gate::allows('semester/edit')) {
            return view('error-404/error-404');
        }
    
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => ['required', 'after_or_equal:start_date']
        ]);
    
        // Set the timezone
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    
        // Create DateTime objects with the specified timezone
        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);
    
        $semester = Semester::find($id);
        $semester->name = $request->name;
        $semester->description = $request->description;
        $semester->start_date = $start_date->format('Y-m-d H:i:s');
        $semester->end_date = $end_date->format('Y-m-d H:i:s');
        $semester->save();
    
        return redirect('admin/semester/add')->with('success', 'Semester updated successfully');
    }    
}
