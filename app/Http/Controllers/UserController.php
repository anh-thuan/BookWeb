<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Faculty;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function list(){
        // if(!Gate::allows('user/list')) {
        //     return view('error-404/error-404');
        // }

        $users = User::orderByRaw("id = '" . Auth::id() . "' DESC")
             ->orderByRaw("id ASC")
             ->simplePaginate(10);
        return view('admin/user/list',compact('users'));
    }

    function add(){
        if(!Gate::allows('user/add')) {
            return view('error-404/error-404');
        }

        $roles=Role::all();
        return view('admin/user/add',compact('roles'));
    }

    // function store(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:5|max:12',
    //         'phone' => 'required|min:10|max:10',
    //         'role_id' => 'required',
    //         'faculty_id' => 'nullable', // Allow faculty_id to be nullable
    //     ]);
    
    //     $roles = Role::find($request->role_id);

    //     $randomString = str_pad(rand(0, 999999), 6, STR_PAD_LEFT);
    
    //     $prefix = $randomString . '-' . $roles->code;
    
    //     $id = IdGenerator::generate([
    //         'table' => 'users', 
    //         'length' => 6 + strlen($request->role_id), 
    //         'type' => 'string', 
    //         'field' => 'id', 
    //         'prefix' => $prefix 
    //     ]);
    
    //     User::create([
    //         'id' => $id,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'phone' => $request->phone,
    //         'role_id' => $request->role_id,
    //         'faculty_id' => $request->faculty_id,
    //     ]);
    
    //     return redirect('admin/user/list')->with('success', 'User added successfully');
    // }

    function store(Request $request){
        if(!Gate::allows('user/add')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'phone' => 'required|min:10|max:10',
            'role_id' => 'required',
        ]);
    
        User::create([
            'id' => str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role_id,
        ]);
    
        return redirect('admin/user/list')->with('success', 'User added successfully');
    }

    // function delete($id){
    //     $code = substr($id, 0, 6);
    //     User::where('id','LIKE', "$code%")->forceDelete();
    //     return redirect('admin/user/list')->with('success','User deleted successfully');

    // }

    function delete($id){
        if(!Gate::allows('user/delete')) {
            return view('error-404/error-404');
        }

        User::where('id',$id)->forceDelete();
        return redirect('admin/user/list')->with('success','User deleted successfully');

    }

    // function edit($id) {
    //     $roles = Role::all();
    //     $code = substr($id, 0, 6);
    //     $faculties=Faculty::all();
    //     $user = User::where('id', 'LIKE', "$code%")->first();
    
    //     return view('admin/user/edit', compact('user', 'roles','faculties'));
    // } 

    function edit($id) {
        // if(!Gate::allows('user/edit')) {
        //     return view('error-404/error-404');
        // }

        $roles = Role::all();
        // $faculties=Faculty::all();
        $user = User::where('id', $id)->first();
    
        return view('admin/user/edit', compact('user', 'roles'));
    } 

    // function update(Request $request, $id){
    //     $request->validate([
    //         'name'=>'required',
    //         'email'=>'required|email',
    //         'password'=>'required', 
    //         'phone'=>'required|min:10|max:10',
    //         'role_id'=>'required',
    //         'faculty_id' => 'nullable'
    //     ]);
    
    //     // Extracting the first 6 characters of the ID
    //     $code = substr($id, 0, 6);
    
    //     // Update the user based on the first 6 characters
    //     User::where('id', 'LIKE', "$code%")->update([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=>Hash::make($request->password), 
    //         'phone'=>$request->phone,
    //         'role_id' => $request->role_id,
    //         'faculty_id' => $request->faculty_id,
    //     ]);
    
    //     return redirect('admin/user/list')->with('success','User updated successfully');
    // }

    function update(Request $request, $id){
        // if(!Gate::allows('user/edit')) {
        //     return view('error-404/error-404');
        // }

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required', 
            'phone'=>'required|min:10|max:10',
            'role_id'=>'required',
        ]);

    
        User::where('id', $id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password), 
            'phone'=>$request->phone,
            'role_id' => $request->role_id,
        ]);
    
        return redirect('admin/user/list')->with('success','User updated successfully');
    }

    // function guestlist(){
    //     $users=User::where('role_id',8)->simplePaginate(10);
    //     return view('admin/user/guestlist',compact('users'));
    // }

    // function guestedit($id){
    //     $user = User::where('id', $id)->first();
    //     $faculties=Faculty::all();
    //     return view('admin/user/guestedit',compact('user','faculties'));
    // }

    // function guestupdate(Request $request, $id){
    //     $request->validate([
    //         'faculties'=>'required'
    //     ]);
    //     $guest = User::where('id', $id)->first(); 
    //     // if (!$guest) {
    //     //     return redirect('user/guestlist')->with('error', 'Guest not found');
    //     // }
    //     $guest->id = $request->id;
    //     $guest->save();
    //     $guest->faculties()->sync($request->input('faculties'));
    //     return redirect('admin/user/guestlist')->with('success','Guest updated successfully');
    // }


    // //GUEST
    // function guestlist(){
    //     $users=User::where('role_id',8)->simplePaginate(10);
    //     return view('admin/role_permission/user/guestlist',compact('users'));
    // }

    // function guestedit($id){
    //     $user = User::where('id', $id)->first();
    //     $faculties=Faculty::all();
    //     return view('admin/role_permission/user/guestedit',compact('user','faculties'));
    // }

    // function guestupdate(Request $request, $id){
    //     $request->validate([
    //         'faculties'=>'required'
    //     ]);
    //     $guest = User::where('id', $id)->first(); 
    //     // if (!$guest) {
    //     //     return redirect('user/guestlist')->with('error', 'Guest not found');
    //     // }
    //     $guest->id = $request->id;
    //     $guest->save();
    //     $guest->faculties()->sync($request->input('faculties'));
    //     return redirect('admin/user/guestlist')->with('success','Guest updated successfully');
    // }
    
    
}
