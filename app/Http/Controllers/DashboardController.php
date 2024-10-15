<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Contribution;
use App\Models\Contribution;
use App\Models\Category;


class DashboardController extends Controller
{
    function show(){
        $role=Auth::user()->role_id ?? '';

        if($role=='4')
        {
            return view('admin/dashboard');
        }
        else if ($role=='5')
        {
            $managerdashboard = Contribution::all();
            $categories = Category::all();
            // $studentdashboard = Contribution::where('status', 'approved')->get();
            return view('manager/dashboard',compact('managerdashboard','categories'));
        }
        else if ($role=='6')
        {
            $coordinatordashboard=Contribution::all();
            return view('coordinator/dashboard',compact('coordinatordashboard'));
        }
        else if ($role=='7')
        {
            $studentdashboard=Contribution::all();
            // $studentdashboard = Contribution::where('status', 'approved')->get();
            return view('student/dashboard',compact('studentdashboard'));
        }
        else if ($role=='8')
        {
            $guestdashboard=Contribution::where('status', 'approved')->get();
            return view('guest/dashboard',compact('guestdashboard'));
        }
        else{
            $guestdashboard=Contribution::where('status', 'approved')->get();
            return view('guest/dashboard',compact('guestdashboard'));
        }
    }

    function info($id){
        $welcomeinfo = Contribution::find($id);
        return view('studentinfo',compact('welcomeinfo'));
    }

    function list(Request $request){
        $keyword="";
        if($request->input('keyword')){
            $keyword= $request->input('keyword');
        }
        $users=Contribution::where('name', 'LIKE', "%{$keyword}%")->all();
        $users->count();

        return view('welcome',compact('users'));
    }

    // function markasread($id){
    //     if($id){
    //         auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
    //     }
    //     return back();
    // }

    function markasread(Request $request){
        auth()->user()->unreadNotifications->when($request->input('id'), function ($query) use ($request) {
            return $query->where('id', $request->input('id'));
        })->markAsRead();
        
        return response()->json(['message' => 'Notification marked as read']);
    }
}
