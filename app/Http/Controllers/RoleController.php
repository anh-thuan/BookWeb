<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use ZipArchive;
use App\Models\Contribution;

class RoleController extends Controller
{
    function list(){
        if(!Gate::allows('role/list')) {
            return view('error-404/error-404');
        }

        $roles=Role::all();
        return view('admin/role_permission/role/list',compact('roles'));
    }

    function add(){
        if(!Gate::allows('role/add')) {
            return view('error-404/error-404');
        }
        
        $permissions= Permission::all()->groupBy(function($permission){
            return explode('/',$permission->slug)[0];
        });
        return view('admin/role_permission/role/add',compact('permissions'));
    }

    function store(Request $request){
        if(!Gate::allows('role/add')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'code'=>'required|unique:roles,code',
            'name'=>'required|unique:roles,name',
        ]);

        $role=Role::create([
            'name'=> $request->name,
            'code'=> $request->code,
            'description' => $request->description,
        ]);

        $role->permissions()->attach($request->input('permission_id'));
        return redirect('admin/role/list')->with('success','Role added successfully');
    }

    function delete($id){
        if(!Gate::allows('role/delete')) {
            return view('error-404/error-404');
        }

        Role::find($id)->forceDelete();
        return redirect('admin/role/list')->with('success','Role deleted successfully');
    }

    function edit($id){
        if(!Gate::allows('role/edit')) {
            return view('error-404/error-404');
        }

        $role=Role::find($id);
        $permissions= Permission::all()->groupBy(function($permission){
            return explode('/',$permission->slug)[0];
        });
        return view('admin/role_permission/role/edit',compact('role','permissions'));
    }

    function update(Request $request, Role $role){
        if(!Gate::allows('role/edit')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name'=>'required|unique:roles,name,'.$role->id,
            'code'=>'required|unique:roles,code,'.$role->id,
            'permission.id' => 'nullable|array',
            'permission.id.*' => 'exists:permissions,id'
        ]);

        $role->update([
            'name'=>$request->input('name'),
            'code'=>$request->input('code'),
            'description'=>$request->input('description'),
        ]);

        $role->permissions()->sync($request->input('permission_id',[]));
        return redirect('admin/role/list')->with('success','Role updated successfully');
    }


}
