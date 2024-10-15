<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\StudentSubmissionNotification;
use App\Notifications\StudentUpdateSubmissionNotification;
use App\Notifications\StudentDeleteSubmissionNotification;
use App\Notifications\CoordinatorNotification;
use App\Notifications\CoordinatorSecondMessage;
use App\Models\Classes; 
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Contribution;
use App\Models\Category;
use App\Models\User;
use ZipArchive;
use Illuminate\Support\Facades\Gate;
use App\Models\Semester;
use DateTime;





class ContributionController extends Controller
{
    function show() {
        if(!Gate::allows('class/show')) {
            return view('error-404/error-404');
        }

        $student = Student::where('user_id', auth()->user()->id)->firstOrFail();
        $classes = Classes::whereHas('students', function ($query) use ($student) {
            $query->where('user_id', $student->user_id);
        })->get();
        return view('student/class/list', compact('student', 'classes'));
    }

    // function list(){
    //     $classes= Classes::all();
    //     return view('student/class/list', compact('classes'));
    // }

    // function login(Classes $class){
    //     return view('student/class/login', compact('class'));
    // }

    // function store(Request $request){
    //     $request->validate([
    //         'key' => 'required|exists:classes,key',
    //     ]);
    //     $student = Student::where('user_id', Auth::id())->firstOrFail();
    //     $class = Classes::where('key', $request->key)->firstOrFail();
    //     $student->class()->attach($class->id);
        
    //     return redirect('student/class/list')->with('success', 'Class joined successfully');
    // }

    function contributionlist(Classes $class)
    {
        // Get contributions for the specified class
        $contributions = Contribution::where('class_id', $class->id)
            ->where('user_id', Auth::id())
            ->simplepaginate(10);

            $student = Student::where('user_id', auth()->user()->id)->firstOrFail();
            $classes = Classes::whereHas('students', function ($query) use ($student) {
                $query->where('user_id', $student->user_id);
            })->get();
        // Return a view with the contributions and the class
        return view('student/contribution/list', compact('contributions', 'class', 'classes', 'student'));
    }

    function historylist(Classes $class)
    {
        if(!Gate::allows('history/historylist')) {
            return view('error-404/error-404');
        }
        // Get contributions for the specified class
        $histories = Contribution::where('class_id', $class->id)
            ->where('user_id', Auth::id())
            ->withTrashed()
            ->get();
        // Return a view with the contributions and the class
        return view('student/history/list', compact('histories'));
        // return view('student/history/list');
    }

    function contributionadd(Classes $class)
    {
        $categories= Category::all();
        return view('student/contribution/add', compact('class','categories'));
    }

    function contributionstore(Request $request, Classes $class)
    {
        // Retrieve the end_date of the class's semester
        $semesterEndDate = Semester::where('id', $class->semester_id)->value('end_date');
    
        // Compare the current date with the end_date
        $currentDate = now();
        $endOfSemester = new DateTime($semesterEndDate);
        if ($currentDate > $endOfSemester) {
            return redirect('student/class/contributionadd/' . $class->id)->with('error', 'Submissions are not allowed after the end of the semester !!!');
        }
    
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'upload_file' => 'required|file|mimes:doc,docx,pdf',
            'upload_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|in:pending,approved,rejected',
            'comment' => 'nullable',
            'popular' => 'nullable'
        ], [
            'status.required' => 'You must accept the terms and conditions',
            'status.in' => 'Invalid status'
        ]);
    
        // Handle file uploads
        $input = $request->all();
        if ($request->hasFile('upload_file')) {
            $file = $request->file('upload_file');
            $filename = $file->getClientOriginalName();
            $path = $file->move('uploads/file', $filename);
            $input['upload_file'] = 'uploads/file/' . $filename;
        }
        if ($request->hasFile('upload_image')) {
            $file = $request->file('upload_image');
            $filename = $file->getClientOriginalName();
            $path = $file->move('uploads/image', $filename);
            $input['thumbnail'] = 'uploads/image/' . $filename;
        }
    
        // Create the Contribution
        $input['class_id'] = $class->id;
        $input['semester_id'] = $class->semester_id;
        $input['user_id'] = Auth::id();
        Contribution::create($input);
        
        // Find the user associated with the contribution
        $user = User::find($input['user_id']);
        
        // Notify the user about the submission via email
        $user->notify(new StudentSubmissionNotification());
    
        // Notify the coordinator about the submission
        $coordinator = $class->user; // Assuming the coordinator is associated with the class through the user_id field
        if ($coordinator) {
            $coordinator->notify(new CoordinatorNotification($user));
        }
        
        return redirect('student/class/contributionlist/' . $class->id)->with('success', 'Contribution added successfully');
    }

    function contributiondelete($class, Contribution $contribution)
    {
        $contribution->delete(); // Soft delete the contribution

        // Find the user associated with the contribution
        $user = User::find($contribution->user_id);
        $user->notify(new StudentDeleteSubmissionNotification());
        return redirect('student/class/contributionlist/' . $class)->with('success', 'Contribution deleted successfully');
    }

    // function contributionrestore($class, Contribution $contribution)
    // {
    //     $contribution->restore(); // Soft delete the contribution
    //     return redirect('student/class/contributionlist/' . $class)->with('success', 'Contribution deleted successfully');
    // }
    
    function contributionedit(Classes $class, $id)
    {
        $contribution = Contribution::where('id', $id)
        ->where('class_id', $class->id)
        ->firstOrFail();
        $categories= Category::all();
        return view('student/contribution/edit', compact('class', 'contribution','categories'));
    }
    
    function contributionupdate(Request $request, Classes $class, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'upload_file' => 'nullable|file|mimes:doc,docx', 
            'upload_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
            'comment' => 'nullable',
            'popular' => 'nullable'
        ]);
    
        $contribution = Contribution::findOrFail($id); // Find the contribution by its id
    
        // Update contribution fields
        $contribution->name = $request->name;
        $contribution->category_id = $request->category_id;
        $contribution->content = $request->content;
    
        // Handle file uploads if provided
        if ($request->hasFile('upload_file')) {
            $file = $request->file('upload_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move('uploads/file', $filename);
            $contribution->upload_file = $path;
        }
    
        if ($request->hasFile('upload_image')) {
            $file = $request->file('upload_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move('uploads/image', $filename);
            $contribution->thumbnail = $path;
        }
    
        // Save the updated contribution
        $contribution->save();
    
        // Find the user associated with the contribution
        $user = User::find($contribution->user_id);
        // Notify the user about the submission update
        $user->notify(new StudentUpdateSubmissionNotification());
    
        // Find the coordinator associated with the class
        $coordinator = $class->user; // Assuming the coordinator is associated with the class through the user_id field
    
        // Send a notification to the coordinator
        if ($coordinator) {
            $coordinator->notify(new CoordinatorSecondMessage($user));
        }
    
        return redirect('student/class/contributionlist/' . $class->id)->with('success', 'Contribution updated successfully');
    }
    

    function contributionaction(Request $request)
    {
        $selectedFiles = $request->input('list_check');

        $zip = new ZipArchive();
        $filename = 'download.zip'; 
        $zipFilePath = public_path($filename);
    
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($selectedFiles as $selectedFile) {
                $file = Contribution::findOrFail($selectedFile); 
                $zip->addFile(public_path($file->upload_file), basename($file->upload_file));
            }
            $zip->close();
        }
    
        return response()->download($zipFilePath, 'download.zip')->deleteFileAfterSend();
    }

    function viewfile(Contribution $contribution)
    {
        // $zip = new ZipArchive();
        // $filename = 'download.zip'; // Name of the zip file
        // $zipFilePath = public_path($filename);
    
        // if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
        //     // Add the DOCX file to the zip archive
        //     $zip->addFile(public_path($contribution->upload_file), 'download.docx');
        //     $zip->close();
        // }
        // return response()->download($zipFilePath, 'download.zip');

        // Get the path to the Word file from the Contribution model
        $wordFilePath = public_path($contribution->upload_file);

        // Check if the Word file exists
        if (!file_exists($wordFilePath)) {
            abort(404, 'File not found');
        }

        // Return the Word file for download
        return response()->download($wordFilePath, 'download.docx');
    }

    function info($id){
        $contribution=Contribution::find($id);
        return view('student/contribution/info',compact('contribution'));

    }

    
}
