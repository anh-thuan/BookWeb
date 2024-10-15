<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\ManagerController;
use App\Models\Contribution;
use App\Models\Student;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $participants= Student::count();
    $contributions= Contribution::count();

    $popularstudent = Contribution::where('status', 'approved')
                               ->where('popular', '1')
                               ->get();
    $student= Contribution::where('status', 'approved')
                            ->simplePaginate(5);
    return view('welcome',compact('popularstudent', 'contributions', 'student','participants'));
});

Route::get('student/welcome/info/{id}',[DashboardController::class,'info'])->name('welcome/info');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function(){
    Route::get('dashboard',[DashboardController::class,'show'])->name('dashboard');
    
    //Mark as read
    Route::post('/markasread', [DashboardController::class,'markasread']);

//ADMIN
    //User
    Route::get('admin/user/list',[UserController::class,'list']);
    Route::get('admin/user/add',[UserController::class,'add']);
    Route::post('admin/user/store',[UserController::class,'store']);
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('user/edit');
    Route::post('admin/user/update/{id}',[UserController::class,'update'])->name('user/update');
    Route::get('admin/user/delete/{id}',[UserController::class,'delete'])->name('user/delete');

    Route::get('/user/list',[UserController::class,'list'])->name('user/list')->can('user/list');
    Route::get('/user/add',[UserController::class,'add'])->name('user/add')->can('user/add');
    Route::post('/user/store',[UserController::class,'store'])->name('user/store')->can('user/add');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user/edit')->can('user/edit');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('user/update')->can('user/edit');
    Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user/delete')->can('user/delete');

    //Guest
    // Route::get('admin/user/guestlist',[UserController::class,'guestlist']);
    // Route::get('admin/user/guestedit/{id}',[UserController::class,'guestedit'])->name('user/guestedit');
    // Route::post('admin/user/guestupdate/{id}',[UserController::class,'guestupdate'])->name('user/guestupdate');

    //Permission
    Route::get('admin/permission/add',[PermissionController::class,'add']);
    Route::post('admin/permission/store',[PermissionController::class,'store']);
    Route::get('admin/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission/edit');
    Route::post('admin/permission/update/{id}',[PermissionController::class,'update'])->name('permission/update');
    Route::get('admin/permission/delete/{id}',[PermissionController::class,'delete'])->name('permission/delete');

    Route::get('/permission/add',[PermissionController::class,'add'])->name('permission/add')->can('permission/add');
    Route::post('/permission/store',[PermissionController::class,'store'])->name('permission/store')->can('permission/add');
    Route::get('/permission/edit/{id}',[PermissionController::class,'edit'])->name('permission/edit')->can('permission/edit');
    Route::post('/permission/update/{id}',[PermissionController::class,'update'])->name('permission/update')->can('permission/edit');
    Route::get('/permission/delete/{id}',[PermissionController::class,'delete'])->name('permission/delete')->can('permission/delete');

    //Role
    Route::get('admin/role/list',[RoleController::class,'list']);
    Route::get('admin/role/add',[RoleController::class,'add']);
    Route::post('admin/role/store',[RoleController::class,'store']);
    Route::get('admin/role/edit/{role}', [RoleController::class, 'edit'])->name('role/edit');
    Route::post('admin/role/update/{role}',[RoleController::class,'update'])->name('role/update');
    Route::get('admin/role/delete/{role}',[RoleController::class,'delete'])->name('role/delete');

    Route::get('/role',[RoleController::class,'list'])->name('role/list')->can('role/list');
    Route::get('/role/add',[RoleController::class,'add'])->name('role/add')->can('role/add');
    Route::post('/role/store',[RoleController::class,'store'])->name('role/store')->can('role/add');
    Route::get('/role/edit/{role}',[RoleController::class,'edit'])->name('role/edit')->can('role/edit');
    Route::post('/role/update/{role}',[RoleController::class,'update'])->name('role/update')->can('role/edit');
    Route::get('/role/delete/{role}',[RoleController::class,'delete'])->name('role/delete')->can('role/delete');

    //Semester
    Route::get('admin/semester/add',[SemesterController::class,'add']);
    Route::post('admin/semester/store',[SemesterController::class,'store']);
    Route::get('admin/semester/edit/{id}', [SemesterController::class, 'edit'])->name('semester/edit');
    Route::post('admin/semester/update/{id}',[SemesterController::class,'update'])->name('semester/update');
    Route::get('admin/semester/delete/{id}',[SemesterController::class,'delete'])->name('semester/delete');

    Route::get('/semester/add',[SemesterController::class,'add'])->name('semester/add')->can('semester/add');
    Route::post('/semester/store',[SemesterController::class,'store'])->name('semester/store')->can('semester/add');
    Route::get('/semester/edit/{id}',[SemesterController::class,'edit'])->name('semester/edit')->can('semester/edit');
    Route::post('/semester/update/{id}',[SemesterController::class,'update'])->name('semester/update')->can('semester/edit');
    Route::get('/semester/delete/{id}',[SemesterController::class,'delete'])->name('semester/delete')->can('semester/delete');

    //Category
    Route::get('admin/category/add',[CategoryController::class,'add']);
    Route::post('admin/category/store',[CategoryController::class,'store']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category/edit');
    Route::post('admin/category/update/{id}',[CategoryController::class,'update'])->name('category/update');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete'])->name('category/delete');

    Route::get('/category/add',[CategoryController::class,'add'])->name('category/add')->can('category/add');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category/store')->can('category/add');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category/edit')->can('category/edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category/update')->can('category/edit');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category/delete')->can('category/delete');

    //Faculty
    Route::get('admin/faculty/add',[FacultyController::class,'add']);
    Route::post('admin/faculty/store',[FacultyController::class,'store']);
    Route::get('admin/faculty/edit/{id}', [FacultyController::class, 'edit'])->name('faculty/edit');
    Route::post('admin/faculty/update/{id}',[FacultyController::class,'update'])->name('faculty/update');
    Route::get('admin/faculty/delete/{id}',[FacultyController::class,'delete'])->name('faculty/delete');

    Route::get('/faculty/add',[FacultyController::class,'add'])->name('faculty/add')->can('faculty/add');
    Route::post('/faculty/store',[FacultyController::class,'store'])->name('faculty/store')->can('faculty/add');
    Route::get('/faculty/edit/{id}',[FacultyController::class,'edit'])->name('faculty/edit')->can('faculty/edit');
    Route::post('/faculty/update/{id}',[FacultyController::class,'update'])->name('faculty/update')->can('faculty/edit');
    Route::get('/faculty/delete/{id}',[FacultyController::class,'delete'])->name('faculty/delete')->can('faculty/delete');

    //Class
    Route::get('admin/class/list',[ClassesController::class,'list']);
    Route::get('admin/class/add',[ClassesController::class,'add']);
    Route::post('admin/class/store',[ClassesController::class,'store']);
    Route::get('admin/class/edit/{id}', [ClassesController::class, 'edit'])->name('class/edit');
    Route::post('admin/class/update/{id}',[ClassesController::class,'update'])->name('class/update');
    Route::get('admin/class/delete/{id}',[ClassesController::class,'delete'])->name('class/delete');

    Route::get('/class/list',[ClassesController::class,'list'])->name('class/list')->can('class/list');
    Route::get('/class/add',[ClassesController::class,'add'])->name('class/add')->can('class/add');
    Route::post('/class/store',[ClassesController::class,'store'])->name('class/store')->can('class/add');
    Route::get('/class/edit/{id}',[ClassesController::class,'edit'])->name('class/edit')->can('class/edit');
    Route::post('/class/update/{id}',[ClassesController::class,'update'])->name('class/update')->can('class/edit');
    Route::get('/class/delete/{id}',[ClassesController::class,'delete'])->name('class/delete')->can('class/delete');




//COORDINATOR
    //Student
    // Route::get('coordinator/student/list',[StudentController::class,'list']);
    Route::get('coordinator/student/add',[StudentController::class,'add']);
    Route::get('coordinator/student/detail',[StudentController::class,'detail'])->name('student/detail');
    Route::post('coordinator/student/store',[StudentController::class,'store']);
    Route::get('coordinator/student/edit/{id}', [StudentController::class, 'edit'])->name('student/edit');
    Route::post('coordinator/student/update/{id}',[StudentController::class,'update'])->name('student/update');
    Route::get('coordinator/student/delete/{id}',[StudentController::class,'delete'])->name('student/delete');

    Route::get('/student/add',[StudentController::class,'add'])->name('student/add')->can('student/add');
    Route::post('/student/store',[StudentController::class,'store'])->name('student/store')->can('student/add');
    Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name('student/edit')->can('student/edit');
    Route::post('/student/update/{id}',[StudentController::class,'update'])->name('student/update')->can('student/edit');
    Route::get('/student/delete/{id}',[StudentController::class,'delete'])->name('student/delete')->can('student/delete');

    //Post
    Route::get('coordinator/post/list',[PostController::class,'list']);
    Route::get('coordinator/post/edit/{id}',[PostController::class,'edit'])->name('post/edit');
    Route::post('coordinator/post/update/{id}',[PostController::class,'update'])->name('post/update');

    Route::get('/post/list',[PostController::class,'list'])->name('post/list')->can('post/list');
    Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post/edit')->can('post/edit');



//STUDENT
    //Dashboard
    Route::get('dashboard/student/info/{id}',[ContributionController::class,'info'])->name('student/info');
    Route::get('dashboard/studentinfo/showfile/{contribution}', [ContributionController::class, 'viewfile'])->name('studentinfo/showfile');

    //Contribution
    Route::post('coordinator/post/contributionaction',[ContributionController::class,'contributionaction'])->name('post/contributionaction');
    Route::get('coordinator/post/viewfile/{contribution}', [ContributionController::class, 'viewfile'])->name('post/viewfile');
    
    Route::post('student/class/contributionaction',[ContributionController::class,'contributionaction'])->name('class/contributionaction');
    Route::get('student/class/viewfile/{contribution}', [ContributionController::class, 'viewfile'])->name('class/viewfile');

    Route::post('manager/post/contributionaction',[ContributionController::class,'contributionaction'])->name('manager/contributionaction');
    Route::get('manager/post/viewfile/{contribution}', [ContributionController::class, 'viewfile'])->name('manager/viewfile');

    Route::get('student/class/show',[ContributionController::class,'show']);
    Route::get('student/class/contributionlist/{class}', [ContributionController::class,'contributionlist'])->name('class/contribution');
    Route::get('student/class/contributionadd/{class}',[ContributionController::class,'contributionadd'])->name('class/contributionadd');
    Route::post('student/class/contributionstore/{class}',[ContributionController::class,'contributionstore'])->name('class/contributionstore');
    Route::get('student/class/contributionedit/{class}/{contribution}',[ContributionController::class,'contributionedit'])->name('class/contributionedit');
    Route::post('student/class/contributionupdate/{class}/{contribution}',[ContributionController::class,'contributionupdate'])->name('class/contributionupdate');
    Route::get('student/class/contributiondelete/{class}/{contribution}',[ContributionController::class,'contributiondelete'])->name('class/contributiondelete');
    Route::get('student/class/contributionrestore/{class}/{contribution}',[ContributionController::class,'contributionrestore'])->name('class/contributionrestore');
    
    Route::get('student/history/historylist/{class}',[ContributionController::class,'historylist'])->name('history/historylist');
    Route::get('/history/historylist/{class}',[ContributionController::class,'historylist'])->name('history/historylist')->can('history/historylist');
    // Route::get('student/history/historylist',[ContributionController::class,'historylist']);

    Route::get('/class/show',[ContributionController::class,'show'])->name('class/show')->can('class/show');
    // Route::get('/class/contributionlist/{class}',[ContributionController::class,'contributionlist'])->name('class/contribution')->can('class/contribution');
    // Route::get('/class/viewfile/{contribution}',[ContributionController::class,'viewfile'])->name('class/viewfile')->can('class/viewfile');
    // Route::get('/class/contributionadd/{class}',[ContributionController::class,'contributionadd'])->name('class/contributionadd')->can('class/contributionadd');
    // Route::post('/class/contributionaction',[ContributionController::class,'contributionaction'])->name('class/contributionaction')->can('class/contributionadd');
    // Route::post('/class/contributionstore/{class}',[ContributionController::class,'contributionstore'])->name('class/contributionstore')->can('class/contributionadd');
    // Route::get('/class/contributionedit/{class}/{contribution}',[ContributionController::class,'contributionedit'])->name('class/contributionedit')->can('class/contributionedit');

//MANAGER
   Route::get('manager/allpost/list',[ManagerController::class,'list']);
   Route::get('/allpost/list',[ManagerController::class,'list'])->name('allpost/list')->can('allpost/list');
});
