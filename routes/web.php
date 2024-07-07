<?php

use App\Http\Controllers\SuperAdmin\SubjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SubTopicsController;
use App\Http\Controllers\SuperAdmin\TopicsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\School\StudentController;
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

//School_subject modual
    Route::get('superadmin/Subject',[SubjectController::class,'index'])->name('Subject');
    Route::get('superadmin/create-Subject',[SubjectController::class,'create'])->name('create_Subject');
    Route::post('superadmin/save-Subject',[SubjectController::class,'store'])->name('save_Subject');
    Route::get('superadmin/edit-Subject/{id}',[SubjectController::class,'edit'])->name('edit_Subject');
    Route::post('superadmin/update-Subject/{id}',[SubjectController::class,'update'])->name('update_Subject');
    Route::delete('superadmin/delete-Subject/{id}',[SubjectController::class,'destroy'])->name('delete_Subject');
    Route::get('/get-standards/{mediumId}', [SubjectController::class,'getStandards'])->name('getstandard');
//School_Topics modual
    Route::get('superadmin/Topics',[TopicsController::class,'index'])->name('topics');
    Route::get('superadmin/create-Topic',[TopicsController::class,'create'])->name('create_topic');
    Route::post('superadmin/save-Topic',[TopicsController::class,'store'])->name('save_topic');
    Route::get('superadmin/edit-Topic/{id}',[TopicsController::class,'edit'])->name('edit_topic');
    Route::post('superadmin/update-Topic/{id}',[TopicsController::class,'update'])->name('update_topic');
    Route::delete('superadmin/delete-Topic/{id}',[TopicsController::class,'destroy'])->name('delete_topic');
    Route::get('/getstandards/{mediumId}', [TopicsController::class,'getStandards'])->name('get-standards');
    Route::get('/get-subjects/{standardId}', [TopicsController::class,'getSubjects'])->name('get-subjects');


    //School_SubTopics modual

    Route::get('superadmin/SubTopics',[SubTopicsController::class,'index'])->name('subtopics');
    Route::get('superadmin/create-SubTopics',[SubTopicsController::class,'create'])->name('create_subtopics');
    Route::post('superadmin/save-SubTopics',[SubTopicsController::class,'store'])->name('save_subtopics');
    Route::get('superadmin/edit-SubTopics/{id}',[SubTopicsController::class,'edit'])->name('edit_subtopics');
    Route::post('superadmin/update-SubTopics/{id}',[SubTopicsController::class,'update'])->name('update_subtopics');
    Route::delete('superadmin/delete-SubTopics/{id}',[SubTopicsController::class,'destroy'])->name('delete_subtopics');
    Route::get('/get_standards/{mediumId}', [SubTopicsController::class,'getStandards'])->name('get_standards');
    Route::get('/get_subjects/{standardId}', [SubTopicsController::class,'getSubjects'])->name('get_subjects');
    Route::get('/get_topics/{subjectId}', [SubTopicsController::class,'getTopics'])->name('get_topics');
    Route::get('/get_subtopics/{topictId}', [SubTopicsController::class,'getSubTopics'])->name('get_subtopics');
});

   Route::middleware(['auth','role:SchoolAdmin'])->group(function () {

    Route::get('SchoolAdmin/school/dashboard', [SchoolController::class, 'dashboard'])->name('schooladmin.dashboard');
    Route::get('SchoolAdmin/students', [StudentController::class, 'index'])->name('schooladmin.students.index');
Route::get('SchoolAdmin/students/create', [StudentController::class, 'create'])->name('schooladmin.students.create');
Route::post('SchoolAdmin/students', [StudentController::class, 'store'])->name('schooladmin.students.store');
Route::get('SchoolAdmin/students/{id}', [StudentController::class, 'show'])->name('schooladmin.students.show');
// Route::resource('SchoolAdmin/students', 'App\Http\Controllers\School\StudentController');

});
