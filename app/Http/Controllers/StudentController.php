<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use App\Models\User;
use App\Models\Classes;

class StudentController extends Controller
{
    function add() {
        if (!Gate::allows('student/add')) {
            return view('error-404/error-404');
        }
    
        // Assuming the logged-in user is a coordinator
        $coordinator = auth()->user();
    
        // Get all coordinators
        $coordinators = User::where('role_id', 'coordinator')->get();
    
        // Get all students participating in classes associated with coordinators' classes
        $students = Student::whereIn('class_id', function ($query) use ($coordinator) {
            $query->select('id')
                  ->from('classes')
                  ->where('user_id', $coordinator->id)
                  ->orWhere('faculty_id', $coordinator->faculty_id);
        })->get();
    
        // Get all classes associated with the coordinator
        $classes = Classes::where('user_id', $coordinator->id)->get();
    
        // Get all users with the role of student
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        })->get();
    
        return view('coordinator/student/add', compact('users', 'coordinators', 'classes', 'students'));
    }

    function store(Request $request)
    {
        if(!Gate::allows('student/add')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'user_id' => 'required|unique:students,user_id,NULL,id,class_id,' . $request->class_id,
            'class_id' => 'required|exists:classes,id',
        ]);

        Student::create([
            'user_id' => $request->user_id,
            'class_id' => $request->class_id,
        ]);

        return redirect('coordinator/student/add')->with('success', 'Student added successfully');
    }

    function delete($id){
        if(!Gate::allows('student/delete')) {
            return view('error-404/error-404');
        }

        Student::find($id)->delete();
        return redirect('coordinator/student/add')->with('success', 'Student deleted successfully');
    }

    function edit($id) {
        if (!Gate::allows('student/edit')) {
            return view('error-404/error-404');
        }
    
        // Assuming the logged-in user is a coordinator
        $coordinator = auth()->user();
    
        // Get the student by ID
        $student = Student::find($id);
    
        // Get all students belonging to classes associated with the coordinator
        $students = Student::whereIn('class_id', function ($query) use ($coordinator) {
            $query->select('id')
                ->from('classes')
                ->where('user_id', $coordinator->id);
        })->get();
    
        // Get all coordinators
        $coordinators = User::where('role_id', 'coordinator')->get();
    
        // Get all classes associated with the coordinator
        $classes = Classes::where('user_id', $coordinator->id)->get();
    
        // Get all users with the role of student
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        })->get();
    
        return view('coordinator.student.edit', compact('student', 'students', 'coordinators', 'users', 'classes'));
    }

    function update(Request $request, $id){
        if(!Gate::allows('student/edit')) {
            return view('error-404/error-404');
        }
        $request->validate([
            'user_id' => 'required',
            'class_id' => 'required|exists:classes,id',
        ]);
        Student::find($id)->update([
            'user_id' => $request->user_id,
            'class_id' => $request->class_id,
        ]);

        return redirect('coordinator/student/add')->with('success', 'Student updated successfully');
    }

    function detail($id){
        $classes=Classes::all();
        $student=Student::find($id);
        // return view('admin/manage/student/detail',compact('student','classes'));
    }
}
