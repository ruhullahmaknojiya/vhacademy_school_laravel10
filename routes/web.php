<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\School\StudentController;
use App\Http\Controllers\School\ParentController;
use App\Http\Controllers\SuperAdmin\EducationalController;
use App\Http\Controllers\School\TeacherController;
use App\Http\Controllers\School\Fees\FeeTypeController;
use App\Http\Controllers\School\Fees\FeeGroupController;
use App\Http\Controllers\School\Fees\FeesMasterController;
use App\Http\Controllers\School\Fees\FeeAssignmentController;
use App\Http\Controllers\School\Fees\FeePaymentController;

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
// Authentication Routes


// Auth::routes();



Route::middleware(['auth', 'role:superAdmin'])->group(function () {

    Route::get('superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/profile', [SuperAdminController::class, 'profile'])->name('superadmin.profile');
    Route::get('/superadmin/settings', [SuperAdminController::class, 'settings'])->name('superadmin.settings');

    //routes for school registration and listing
    Route::get('schools/register', [SuperAdminController::class, 'registerSchoolForm'])->name('school.register.form');
    Route::post('schools/register', [SuperAdminController::class, 'registerSchool'])->name('school.register');
    Route::get('schools', [SuperAdminController::class, 'listSchools'])->name('school.list');
    Route::get('schools/{school}/edit', [SuperAdminController::class, 'editSchoolForm'])->name('schools.edit');
    Route::patch('schools/{school}/disable', [SuperAdminController::class, 'disableSchool'])->name('schools.disable');
    Route::get('/schools/{id}', [SuperAdminController::class, 'show'])->name('schools.show');
    //routes for Educational Details registration and listing
   // Medium Routes
   Route::get('superadmin/medium', [EducationalController::class, 'indexMedium'])->name('superadmin.medium.index');
   Route::get('superadmin/medium/create', [EducationalController::class, 'createMedium'])->name('superadmin.medium.create');
   Route::post('superadmin/medium', [EducationalController::class, 'storeMedium'])->name('superadmin.medium.store');
   Route::get('superadmin/medium/{id}/edit', [EducationalController::class, 'editMedium'])->name('superadmin.medium.edit');
   Route::put('superadmin/medium/{id}', [EducationalController::class, 'updateMedium'])->name('superadmin.medium.update');
   Route::delete('superadmin/medium/{id}', [EducationalController::class, 'destroyMedium'])->name('superadmin.medium.destroy');

   // Standard Routes
   Route::get('superadmin/standard', [EducationalController::class, 'indexStandard'])->name('superadmin.standard.index');
   Route::get('superadmin/standard/create', [EducationalController::class, 'createStandard'])->name('superadmin.standard.create');
   Route::post('superadmin/standard', [EducationalController::class, 'storeStandard'])->name('superadmin.standard.store');
   Route::get('superadmin/standard/{id}/edit', [EducationalController::class, 'editStandard'])->name('superadmin.standard.edit');
   Route::put('superadmin/standard/{id}', [EducationalController::class, 'updateStandard'])->name('superadmin.standard.update');
   Route::delete('superadmin/standard/{id}', [EducationalController::class, 'destroyStandard'])->name('superadmin.standard.destroy');

   // Class Routes
   Route::get('superadmin/class', [EducationalController::class, 'indexClass'])->name('superadmin.class.index');
   Route::get('superadmin/class/create', [EducationalController::class, 'createClass'])->name('superadmin.class.create');
   Route::post('superadmin/class', [EducationalController::class, 'storeClass'])->name('superadmin.class.store');
   Route::get('superadmin/class/{id}/edit', [EducationalController::class, 'editClass'])->name('superadmin.class.edit');
   Route::put('superadmin/class/{id}', [EducationalController::class, 'updateClass'])->name('superadmin.class.update');
   Route::delete('superadmin/class/{id}', [EducationalController::class, 'destroyClass'])->name('superadmin.class.destroy');


});

   Route::middleware(['auth','role:SchoolAdmin'])->group(function () {

    Route::get('SchoolAdmin/school/dashboard', [SchoolController::class, 'dashboard'])->name('schooladmin.dashboard');
    Route::get('SchoolAdmin/students', [StudentController::class, 'index'])->name('schooladmin.students.index');
Route::get('SchoolAdmin/students/create', [StudentController::class, 'create'])->name('schooladmin.students.create');
Route::post('SchoolAdmin/students', [StudentController::class, 'store'])->name('schooladmin.students.store');
Route::get('SchoolAdmin/students/{id}', [StudentController::class, 'show'])->name('schooladmin.students.show');

//Parents Route
Route::get('SchoolAdmin/parents', [ParentController::class, 'index'])->name('schooladmin.parents.index');
Route::get('SchoolAdmin/parents/{id}', [ParentController::class, 'show'])->name('schooladmin.parents.show');

//Teacher Route
Route::get('SchoolAdmin/teachers', [TeacherController::class, 'index'])->name('schooladmin.teachers.index');
Route::get('SchoolAdmin/teachers/create', [TeacherController::class, 'create'])->name('schooladmin.teachers.create');
Route::post('SchoolAdmin/teachers', [TeacherController::class, 'store'])->name('schooladmin.teachers.store');
Route::post('SchoolAdmin/teachers/{id}', [TeacherController::class, 'show'])->name('schooladmin.teachers.show');

//Fee Collection Route
// Fee Type
Route::get('SchoolAdmin/feetype', [FeeTypeController::class, 'index'])->name('schooladmin.feecollection.feetype.index');
Route::get('SchoolAdmin/feetype/create', [FeeTypeController::class, 'create'])->name('schooladmin.feecollection.feetype.create');
Route::post('SchoolAdmin/feetype', [FeeTypeController::class, 'store'])->name('schooladmin.feecollection.feetype.store');
Route::post('SchoolAdmin/feetype/{id}', [FeeTypeController::class, 'show'])->name('schooladmin.feecollection.feetype.show');
Route::get('SchoolAdmin/feetype/{id}/edit', [FeeTypeController::class, 'editClass'])->name('schooladmin.feecollection.feetype.edit');
// Fee Group
Route::get('SchoolAdmin/feegroup', [FeeGroupController::class, 'index'])->name('schooladmin.feecollection.feegroup.index');
Route::get('SchoolAdmin/feegroup/create', [FeeGroupController::class, 'create'])->name('schooladmin.feecollection.feegroup.create');
Route::post('SchoolAdmin/feegroup', [FeeGroupController::class, 'store'])->name('schooladmin.feecollection.feegroup.store');
Route::post('SchoolAdmin/feegroup/{id}', [FeeGroupController::class, 'show'])->name('schooladmin.feecollection.feegroup.show');
Route::get('SchoolAdmin/feegroup/{id}/edit', [FeeGroupController::class, 'editClass'])->name('schooladmin.feecollection.feegroup.edit');

// Fee Master
Route::get('SchoolAdmin/feesmaster', [FeesMasterController::class, 'index'])->name('schooladmin.feecollection.feesmaster.index');
Route::get('SchoolAdmin/feesmaster/create', [FeesMasterController::class, 'create'])->name('schooladmin.feecollection.feesmaster.create');
Route::post('SchoolAdmin/feesmaster', [FeesMasterController::class, 'store'])->name('schooladmin.feecollection.feesmaster.store');
Route::post('SchoolAdmin/feesmaster/{id}', [FeesMasterController::class, 'show'])->name('schooladmin.feecollection.feesmaster.show');
Route::get('SchoolAdmin/feesmaster/{id}/edit', [FeesMasterController::class, 'editClass'])->name('schooladmin.feecollection.feesmaster.edit');

// Fee Assign to Class wise Student
Route::get('SchoolAdmin/feesassign', [FeeAssignmentController::class, 'index'])->name('schooladmin.feecollection.feesassign.index');
Route::get('SchoolAdmin/feesassign/create', [FeeAssignmentController::class, 'create'])->name('schooladmin.feecollection.feesassign.create');
Route::post('SchoolAdmin/feesassign', [FeeAssignmentController::class, 'store'])->name('schooladmin.feecollection.feesassign.store');
Route::post('SchoolAdmin/feesassign/{id}', [FeeAssignmentController::class, 'show'])->name('schooladmin.feecollection.feesassign.show');
Route::get('SchoolAdmin/feesassign/{id}/edit', [FeeAssignmentController::class, 'editClass'])->name('schooladmin.feecollection.feesassign.edit');

// Fee Collect And Fee Payment to Class wise Student
Route::get('SchoolAdmin/feepayment', [FeePaymentController::class, 'index'])->name('schooladmin.feecollection.feepayment.index');
Route::get('SchoolAdmin/feepayment/dueFees', [FeePaymentController::class, 'dueFees'])->name('schooladmin.feecollection.feepayment.dueFees');
Route::get('SchoolAdmin/feepayment/create', [FeePaymentController::class, 'create'])->name('schooladmin.feecollection.feepayment.create');
Route::post('SchoolAdmin/feepayment', [FeePaymentController::class, 'store'])->name('schooladmin.feecollection.feepayment.store');
Route::post('SchoolAdmin/feepayment/{id}', [FeePaymentController::class, 'show'])->name('schooladmin.feecollection.feepayment.show');
Route::get('SchoolAdmin/feepayment/{id}/edit', [FeePaymentController::class, 'editClass'])->name('schooladmin.feecollection.feepayment.edit');
});
