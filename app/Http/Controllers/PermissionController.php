<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public function add()
    {
        if(!Gate::allows('permission/add')) {
            return view('error-404/error-404');
        }

        $permissions= Permission::all()->groupBy(function($permission){
            return explode('/',$permission->slug)[0];
        });
        return view('admin/role_permission/permission/add',compact('permissions'));
    }

    public function store(Request $request)
    {
        if(!Gate::allows('permission/add')) {
            return view('error-404/error-404');
        }

        $request ->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);
        Permission::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'description' =>$request->description,
        ]);
        return redirect('admin/permission/add')->with('success','Permission Added Successfully');
    }

    function delete($id){
        if(!Gate::allows('permission/delete')) {
            return view('error-404/error-404');
        }

        Permission::find($id)->delete();
        return redirect('admin/permission/add')->with('success','Permission Deleted Successfully');
    }

    function edit($id){
        if(!Gate::allows('permission/edit')) {
            return view('error-404/error-404');
        }

        $permission= Permission::find($id);
        $permissions= Permission::all()->groupBy(function($permission){
            return explode('/',$permission->slug)[0];
        });
        return view('admin/role_permission/permission/edit',compact('permission','permissions'));
    }

    function update(Request $request, $id){
        if(!Gate::allows('permission/edit')) {
            return view('error-404/error-404');
        }
        
        $request ->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);
        Permission::where('id',$id)->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'description' =>$request->description,
        ]);
        return redirect('admin/permission/add')->with('success','Permission Updated Successfully');
    }

}
