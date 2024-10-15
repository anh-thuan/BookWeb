<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;
use Illuminate\Support\Facades\Gate;

class ManagerController extends Controller
{
    function list(){
        if(!Gate::allows('allpost/list')) {
            return view('error-404/error-404');
        }

        $managers=Contribution::all();
        return view ('manager/post/list',compact('managers'));
    }
}
