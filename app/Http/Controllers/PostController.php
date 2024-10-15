<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use ZipArchive;

class PostController extends Controller
{
    function list()
    {
        if(!Gate::allows('post/list')) {
            return view('error-404/error-404');
        }

        $coordinator = Auth::user();
    
        // Retrieve contributions based on the coordinator's class_id and student_id
        $posts = Contribution::whereHas('class', function ($query) use ($coordinator) {
            $query->where('user_id', $coordinator->id);
        })->simplepaginate(10);
    
        return view('coordinator/post/list', compact('posts'));
    }

    function edit($id){
        if(!Gate::allows('post/edit')) {
            return view('error-404/error-404');
        }

        $post = Contribution::find($id);
        $post_status = Contribution::all();
        return view('coordinator/post/edit', compact('post','post_status'));
    }

    function update(Request $request, $id){
        if(!Gate::allows('post/edit')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'status'=>'required',
            'comment'=>'nullable',
            'popular'=>'nullable'
        ]);

        $post = Contribution::find($id);
        $post->status = $request->status;
        $post->comment = $request->comment;
        $post->popular = $request->popular;
        $post->save();
        return redirect('coordinator/post/list')->with('success','Post updated successfully');
        
    }

    // function download(Request $request){
    //     $selectedFiles = $request->input('list_check');

    //     $zip = new ZipArchive();
    //     $filename = 'download.zip'; 
    //     $zipFilePath = public_path($filename);
    
    //     if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
    //         foreach ($selectedFiles as $selectedFile) {
    //             $file = Contribution::findOrFail($selectedFile); 
    //             $zip->addFile(public_path($file->upload_file), basename($file->upload_file));
    //         }
    //         $zip->close();
    //     }
    
    //     return response()->download($zipFilePath, 'download.zip')->deleteFileAfterSend();
    // }

    // function viewfile(Contribution $contribution)
    // {
    //     $zip = new ZipArchive();
    //     $filename = 'download.zip'; // Name of the zip file
    //     $zipFilePath = public_path($filename);
    
    //     if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
    //         // Add the DOCX file to the zip archive
    //         $zip->addFile(public_path($contribution->upload_file), 'download.docx');
    //         $zip->close();
    //     }
    //     return response()->download($zipFilePath, 'download.zip');
    // }
}
