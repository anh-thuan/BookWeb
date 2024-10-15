<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    function add(){

    if(!Gate::allows('category/add')) {
        return view('error-404/error-404');
    }
        $categories=Category::all();
        return view('admin/category/add',compact('categories'));
    }

    function store(Request $request){
        if(!Gate::allows('category/add')) {
            return view('error-404/error-404');
        }

        $request -> validate([
            'name'=>'required',
        ]);

        Category::Create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect('admin/category/add')->with('success','Category added successfully');
    }

    function delete($id){
        if(!Gate::allows('category/delete')) {
            return view('error-404/error-404');
        }

        Category::find($id)->forceDelete();
        return redirect('admin/category/add')->with('success','Category deleted successfully');
    }

    function edit($id){
        if(!Gate::allows('category/edit')) {
            return view('error-404/error-404');
        }

        $category=Category::find($id);
        $categories=Category::all();
        return view('admin/category/edit',compact('category','categories'));
    }

    function update(Request $request,$id){
        if(!Gate::allows('category/edit')) {
            return view('error-404/error-404');
        }

        $request -> validate([
            'name'=>'required',
        ]);

        Category::find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect('admin/category/add')->with('success','Category updated successfully');
    }
}
