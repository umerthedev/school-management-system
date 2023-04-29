<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;




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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

//Admin Route
//Logout 
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('admin.logout');

//User Management System
Route::prefix('Users')->group(function(){

    //view.user
    Route::get('/view',[UsersController::class,'view'])->name('view.user');
    //user.add
    Route::get('/add',[UsersController::class,'add'])->name('user.add');
    //store.user
    Route::post('/store',[UsersController::class,'store'])->name('store.user');
    //user.edit
    Route::get('/edit/{id}',[UsersController::class,'edit'])->name('user.edit');
    //user.update
    Route::post('/update/{id}',[UsersController::class,'update'])->name('user.update');
    //user.delete
    Route::get('/delete/{id}',[UsersController::class,'delete'])->name('user.delete');

});

//Your Profile & Change Password rooute
Route::prefix('profile')->group(function(){

    //your.profile
    Route::get('/view',[ProfileController::class,'profile'])->name('your.profile');

    //edit.profile
    Route::get('/edit',[ProfileController::class,'edit'])->name('edit.profile');

    //update.profile
    Route::post('/store',[ProfileController::class,'update'])->name('update.profile');

    //password.view
    Route::get('/password/view',[ProfileController::class,'passwordView'])->name('password.view');

    //password.update
    Route::post('/password/update',[ProfileController::class,'passwordUpdate'])->name('password.update');
    

});


//Student Class, Year, Group Route
Route::prefix('Student')->group(function(){

    //your.profile
    Route::get('/Class/view',[StudentClassController::class,'viewStudent'])->name('student.class.view');
    //add.student.class
    Route::get('/Class/add',[StudentClassController::class,'addStudent'])->name('add.student.class');
    //store.student.class
    Route::post('/Class/store',[StudentClassController::class,'storeStudent'])->name('store.student.class');
    //student.class.edit
    Route::get('/Class/edit/{id}',[StudentClassController::class,'editStudent'])->name('student.class.edit');
    //update.student.class
    Route::post('/Class/update/{id}',[StudentClassController::class,'updateStudent'])->name('update.student.class');
    //student.class.delete
    Route::get('/Class/delete/{id}',[StudentClassController::class,'deleteStudent'])->name('student.class.delete');



    //Student Year Route
    //student.year.view
    Route::get('/Year/view',[StudentYearController::class,'viewYear'])->name('student.year.view');
    //add.student.year
    Route::get('/Year/add',[StudentYearController::class,'addYear'])->name('add.student.year');
    //store.student.year
    Route::post('/Year/store',[StudentYearController::class,'storeYear'])->name('store.student.year');
    //student.year.edit
    Route::get('/Year/edit/{id}',[StudentYearController::class,'editYear'])->name('student.year.edit');
    //update.student.year
    Route::post('/Year/update/{id}',[StudentYearController::class,'updateYear'])->name('update.student.year');
    //student.year.delete
    Route::get('/Year/delete/{id}',[StudentYearController::class,'deleteYear'])->name('student.year.delete');



    //Student Group Route
    //student.group.view
    Route::get('/Group/View',[StudentGroupController::class,'viewGroup'])->name('student.group.view');
    //add.student.group
    Route::get('/Group/add',[StudentGroupController::class,'addGroup'])->name('add.student.group');
    //store.student.class
    Route::post('/Group/store',[StudentGroupController::class,'storeGroup'])->name('store.student.group');
    //student.group.edit
    Route::get('/Group/edit/{id}',[StudentGroupController::class,'editGroup'])->name('student.group.edit');
    //update.student.group
    Route::post('/Group/update/{id}',[StudentGroupController::class,'updateGroup'])->name('update.student.group');
    //student.group.delete
    Route::get('/Group/delete/{id}',[StudentGroupController::class,'deleteGroup'])->name('student.group.delete');



    //Student Shift Route
    //student.shift.view
    Route::get('/Shift/View',[StudentShiftController::class,'viewShift'])->name('student.shift.view');
    //add.student.shift
    Route::get('/Shift/add',[StudentShiftController::class,'addShift'])->name('add.student.shift');
    //store.student.shift
    Route::post('/Shift/store',[StudentShiftController::class,'storeShift'])->name('store.student.shift');
    //student.shift.edit
    Route::get('/Shift/edit/{id}',[StudentShiftController::class,'editShift'])->name('student.shift.edit');
    //update.student.shift
    Route::post('/Shift/update/{id}',[StudentShiftController::class,'updateShift'])->name('update.student.shift');
    //student.shift.delete
    Route::get('/Shift/delete/{id}',[StudentShiftController::class,'deleteShift'])->name('student.shift.delete');
    
   
   
   
    //Studnet Fee Category Routes
    //fee.category.view
    Route::get('/Fee/Category/View',[FeeCategoryController::class,'viewFeeCategory'])->name('fee.category.view');
    //add_fee_category
    Route::get('/Fee/Category/add',[FeeCategoryController::class,'addFeeCategory'])->name('add.fee.category');
    //store.fee.category
    Route::post('/Fee/Category/store',[FeeCategoryController::class,'storeFeeCategory'])->name('store.fee.category');
    //fee.category.edit
    Route::get('/Fee/Category/edit/{id}',[FeeCategoryController::class,'editFeeCategory'])->name('fee.category.edit');
    //update.fee.category
    Route::post('/Fee/Category/update/{id}',[FeeCategoryController::class,'updateFeeCategory'])->name('update.fee.category');
    //fee.category.delete
    Route::get('/Fee/Category/delete/{id}',[FeeCategoryController::class,'deleteFeeCategory'])->name('fee.category.delete');


    //Studnet Fee Category Fee Routes
    //fee.amount.view
    Route::get('/Fee/Amount/View',[FeeAmountController::class,'viewFeeAmount'])->name('fee.amount.view');
    //add.fee.amount
    Route::get('/Fee/Amount/add',[FeeAmountController::class,'addFeeAmount'])->name('add.fee.amount');
    //store.fee.amount
    Route::post('/Fee/Amount/store',[FeeAmountController::class,'storeFeeAmount'])->name('store.fee.amount');
    //fee.amount.edit
    Route::get('/Fee/Amount/edit/{fee_category_id}',[FeeAmountController::class,'editFeeAmount'])->name('fee.amount.edit');
    //update.fee.amount
    Route::post('/Fee/Amount/update/{fee_category_id}',[FeeAmountController::class,'updateFeeAmount'])->name('update.fee.amount');
    //fee.amount.delete
    Route::get('/Fee/Amount/delete/{fee_category_id}',[FeeAmountController::class,'deleteFeeAmount'])->name('fee.amount.delete');
    //fee.amount.details
    Route::get('/Fee/Amount/details/{fee_category_id}',[FeeAmountController::class,'detailsFeeAmount'])->name('fee.amount.details');


    //Student Exam Type Routes
    //exam.type.view
    Route::get('/Exam/Type/View',[ExamTypeController::class,'viewExamType'])->name('exam.type.view');
    //add.exam.type
    Route::get('/Exam/Type/add',[ExamTypeController::class,'addExamType'])->name('add.exam.type');  
    //store.exam.type
    Route::post('/Exam/Type/store',[ExamTypeController::class,'storeExamType'])->name('store.exam.type');
    //exam.type.edit
    Route::get('/Exam/Type/edit/{id}',[ExamTypeController::class,'editExamType'])->name('exam.type.edit');
    //update.exam.type
    Route::post('/Exam/Type/update/{id}',[ExamTypeController::class,'updateExamType'])->name('update.exam.type');
    //exam.type.delete
    Route::get('/Exam/Type/delete/{id}',[ExamTypeController::class,'deleteExamType'])->name('exam.type.delete');


    //Studnet Subject Route
    //school.subject.view
    Route::get('/Subject/View',[SchoolSubjectController::class,'viewSubject'])->name('school.subject.view');
    //add.school.subject
    Route::get('/Subject/add',[SchoolSubjectController::class,'addSubject'])->name('add.school.subject');
    //store.school.subject
    Route::post('/Subject/store',[SchoolSubjectController::class,'storeSubject'])->name('store.school.subject');
    //school.subject.edit
    Route::get('/Subject/edit/{id}',[SchoolSubjectController::class,'editSubject'])->name('school.subject.edit');
    //update.school.subject
    Route::post('/Subject/update/{id}',[SchoolSubjectController::class,'updateSubject'])->name('update.school.subject');
    //school.subject.delete
    Route::get('/Subject/delete/{id}',[SchoolSubjectController::class,'deleteSubject'])->name('school.subject.delete');


    //Assign Subject Routes
    //assign.subject.view
    Route::get('/Assign/Subject/View',[AssignSubjectController::class,'viewAssignSubject'])->name('assign.subject.view');
    //add.assign.subject
    Route::get('/Assign/Subject/add',[AssignSubjectController::class,'addAssignSubject'])->name('add.assign.subject');

});
