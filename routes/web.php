<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\School\StudentController;
use App\Http\Controllers\School\ParentController;
use App\Http\Controllers\SuperAdmin\EducationalController;

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

// Route::resource('parents', ParentController::class);

});
