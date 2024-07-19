<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\School\TeacherTimeController;
use App\Http\Controllers\SuperAdmin\EventController;
use App\Http\Controllers\SuperAdmin\SubjectController;
use App\Http\Controllers\SuperAdmin\SubTopicsController;
use App\Http\Controllers\SuperAdmin\TopicsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\School\Event\SchoolEvController;
use App\Http\Controllers\School\Holiday\SchoolHolidayController;
use App\Http\Controllers\School\StudentController;
use App\Http\Controllers\School\ParentController;
use App\Http\Controllers\SuperAdmin\EducationalController;
use App\Http\Controllers\School\TeacherController;
use App\Http\Controllers\School\Fees\FeeTypeController;
use App\Http\Controllers\School\Fees\FeeGroupController;
use App\Http\Controllers\School\Fees\FeesMasterController;
use App\Http\Controllers\School\Fees\FeeAssignmentController;
use App\Http\Controllers\School\Fees\FeePaymentController;
use App\Http\Controllers\School\Homework\HomeworkController;
use App\Http\Controllers\School\LmsContent\ChapterLmsController;
use App\Http\Controllers\School\LmsContent\ClassLmsController;
use App\Http\Controllers\School\LmsContent\MediumLmsController;
use App\Http\Controllers\School\LmsContent\StandardLmsController;
use App\Http\Controllers\School\LmsContent\SubjectLmsController;
use App\Http\Controllers\School\LmsContent\TopicLmsController;
use App\Http\Controllers\SuperAdmin\HomeSubjectController;
use App\Http\Controllers\SuperAdmin\EventNewImportController;
use App\Http\Controllers\School\EventImportSchlController;
use App\Http\Controllers\School\TeacherAssign\ClassTeacherAssignmentController;
use App\Http\Controllers\School\Attendence\AttendenceController;
use App\Http\Controllers\School\PaymentGetway\PaymentConfigurationController;
use App\Http\Controllers\SuperAdmin\PaymentGetway\ProvidersController;
use App\Http\Controllers\School\TeacherSubjectAssign\TeacherSubjectAssignController;


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

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['middlware'=> ['auth','role:SuperAdmin']], function () {


    Route::get('superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::post('/update-event-date', [SuperAdminController::class, 'updateEventDate'])->name('update.event.date');
    Route::get('superadmin/profile', [SuperAdminController::class, 'profile'])->name('superadmin.profile');
    Route::get('superadmin/settings', [SuperAdminController::class, 'settings'])->name('superadmin.settings');

    //routes for school registration and listing
    Route::get('schools/register', [SuperAdminController::class, 'registerSchoolForm'])->name('school.register.form');
    Route::post('schools/register', [SuperAdminController::class, 'registerSchool'])->name('school.register');
    Route::get('schools', [SuperAdminController::class, 'listSchools'])->name('school.list');
    Route::get('schools/{school}/edit', [SuperAdminController::class, 'editSchoolForm'])->name('schools.edit');
    Route::patch('schools/{school}/disable', [SuperAdminController::class, 'disableSchool'])->name('schools.disable');
    Route::get('schools/{id}', [SuperAdminController::class, 'show'])->name('schools.show');
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
    Route::get('superadmin/Subject',[SubjectController::class,'index'])->name('subjects');
    Route::get('superadmin/create-Subject',[SubjectController::class,'create'])->name('create_Subject');
    Route::post('superadmin/save-Subject',[SubjectController::class,'store'])->name('save_Subject');
    Route::get('superadmin/edit-Subject/{id}',[SubjectController::class,'edit'])->name('edit_Subject');
    Route::post('superadmin/update-Subject/{id}',[SubjectController::class,'update'])->name('update_Subject');
    Route::delete('superadmin/delete-Subject/{id}',[SubjectController::class,'destroy'])->name('delete_Subject');
    // Route::get('/get-standards/{mediumId}', [SubjectController::class,'getStandards'])->name('getstandard');
    Route::get('/getnewstandard/{mediumId}', [SubjectController::class,'getStandards'])->name('getstandard');
    Route::get('/get-newstandards/{medium_id}', [SubjectController::class, 'getStandards'])->name('getnewestandard');

    //School_Topics modual
    Route::get('superadmin/Chapter',[TopicsController::class,'index'])->name('topics');
    Route::get('superadmin/create-Chapter',[TopicsController::class,'create'])->name('create_topic');
    Route::post('superadmin/save-Chapter',[TopicsController::class,'store'])->name('save_topic');
    Route::get('superadmin/edit-Chapter/{id}',[TopicsController::class,'edit'])->name('edit_topic');
    Route::post('superadmin/update-Chapter/{id}',[TopicsController::class,'update'])->name('update_topic');
    Route::delete('superadmin/delete-Chapter/{id}',[TopicsController::class,'destroy'])->name('delete_topic');
    Route::get('/getstandards/{mediumId}', [TopicsController::class,'getStandards'])->name('get-standards');
    Route::get('/get-subjects/{standardId}', [TopicsController::class,'getSubjects'])->name('get-subjects');


    //School_SubTopics modual
    Route::get('superadmin/SubTopics',[SubTopicsController::class,'index'])->name('subtopics.index');
    Route::get('superadmin/create-SubTopics',[SubTopicsController::class,'create'])->name('create_subtopics');
    Route::post('superadmin/save-SubTopics',[SubTopicsController::class,'store'])->name('save_subtopics');
    Route::get('superadmin/edit-SubTopics/{id}',[SubTopicsController::class,'edit'])->name('edit_subtopics');
    Route::post('superadmin/update-SubTopics/{id}',[SubTopicsController::class,'update'])->name('update_subtopics');
    Route::delete('superadmin/delete-SubTopics/{id}',[SubTopicsController::class,'destroy'])->name('delete_subtopics');
    Route::get('get_standards/{mediumId}', [SubTopicsController::class,'getStandards'])->name('get_standards');
    Route::get('get_subjects/{standardId}', [SubTopicsController::class,'getSubjects'])->name('get_subjects');
    Route::get('get_topics/{subjectId}', [SubTopicsController::class,'getTopics'])->name('get_topics');
    Route::get('get_subtopics/{topictId}', [SubTopicsController::class,'getSubTopics'])->name('get_subtopics');
    // Route::get('get-newstandards', [SubjectController::class, 'getNewStandards'])->name('get-newstandards');
    // Route to get new standards based on the selected medium
    Route::get('/get-newstandards', 'SubTopicsController@getNewStandards')->name('get-newstandards');

    // Route to get new subjects based on the selected standard
    Route::get('/get-newsubjects', 'SubTopicsController@getNewSubjects')->name('get-newsubjects');

    // Route to get new topics based on the selected subject
    Route::get('/get-newtopics', 'SubTopicsController@getNewTopics')->name('get-newtopics');

    //Event modual
    Route::get('superadmin/events',[EventController::class,'index'])->name('superadmin.events.index');
    Route::get('superadmin/events/create',[EventController::class,'create'])->name('superadmin.events.create');
    Route::post('superadmin/events/store',[EventController::class,'store'])->name('superadmin.events.store');
    Route::get('superadmin/events/edit/{id}',[EventController::class,'edit'])->name('superadmin.events.edit');
    Route::post('superadmin/events/update/{id}',[EventController::class,'update'])->name('superadmin.events.update');
    Route::delete('superadmin/events/delete/{id}',[EventController::class,'destroy'])->name('superadmin.events.delete');

     //Event Import
    Route::get('superadmin/importevents', function () {
        return view('superadmin.events.importevent');
    })->name('superadmin.import');
    Route::post('superadmin/importevents', [EventNewImportController::class, 'import'])->name('superadmin.import.events');

     //home_course
    //School_subject modual
    Route::get('superadmin.homesubject',[HomeSubjectController::class,'index'])->name('superadmin.homesubject.index');
    Route::get('superadmin.homesubject/create',[HomeSubjectController::class,'create'])->name('superadmin.homesubject.create');
    Route::post('superadmin.homesubject/store',[HomeSubjectController::class,'store'])->name('superadmin.homesubject.store');
    Route::get('superadmin.homesubject/edit/{id}',[HomeSubjectController::class,'edit'])->name('superadmin.homesubject.edit');
    Route::post('superadmin.homesubject/update/{id}',[HomeSubjectController::class,'update'])->name('superadmin.homesubject.update');
    Route::delete('superadmin.homesubject/delete/{id}',[HomeSubjectController::class,'destroy'])->name('superadmin.homesubject.destroy');

    // Route::resource('superadmin/providers', SuperAdminProviderController::class);
    Route::get('superadmin/providers', [ProvidersController::class, 'index'])->name('superadmin.providers.index');
    Route::get('superadmin/providers/create', [ProvidersController::class, 'create'])->name('superadmin.providers.create');
    Route::post('superadmin.providers/store',[ProvidersController::class,'store'])->name('superadmin.providers.store');
    Route::get('superadmin.providers/edit',[ProvidersController::class,'edit'])->name('superadmin.providers.edit');
    Route::post('superadmin.providers/update/{id}',[ProvidersController::class,'update'])->name('superadmin.providers.update');
    Route::delete('superadmin.providers/delete/{id}',[ProvidersController::class,'destroy'])->name('superadmin.providers.destroy');

});

Route::group(['middlware'=> ['auth','role:SchoolAdmin']], function () {

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



    //teacher time table
    Route::get('SchoolAdmin/Teacher/Timetable',[TeacherTimeController::class,'index'])->name('teacher.timetable.index');
    Route::get('SchoolAdmin/Teacher/Create-Timetable',[TeacherTimeController::class,'create'])->name('teacher_timetable');
    Route::post('SchoolAdmin/Teacher/Save-Timetable',[TeacherTimeController::class,'store'])->name('teacher_timetable_insert');
    Route::get('SchoolAdmin/Teacher/Edit-Timetable/{id}',[TeacherTimeController::class,'edit'])->name('teacher_timetable_edit');
    Route::post('SchoolAdmin/Teacher/Update-Timetable/{id}',[TeacherTimeController::class,'update'])->name('teacher_timetable_update');
    Route::delete('SchoolAdmin/Teacher/Delete-Timetable/{id}',[TeacherTimeController::class,'destroy'])->name('teacher_timetable_delete');
    Route::get('standards/{mediumId}', [TeacherTimeController::class,'standards'])->name('teacher_standard');
    Route::get('/subjects/{standardId}', [TeacherTimeController::class,'subjects'])->name('teacher_subjects');

    //** Fee Collection Route ***
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

    //HomeWork Route
    Route::get('SchoolAdmin/homework', [HomeworkController::class, 'index'])->name('schooladmin.homework.index');
    Route::get('SchoolAdmin/homework/{id}', [HomeworkController::class, 'show'])->name('schooladmin.homework.show');

    //LMS Content For School Only View
    Route::get('SchoolAdmin/medium', [MediumLmsController::class, 'index'])->name('schooladmin.educational.medium.index');
    Route::get('SchoolAdmin/standard', [StandardLmsController::class, 'index'])->name('schooladmin.educational.standard.index');
    Route::get('SchoolAdmin/class', [ClassLmsController::class, 'index'])->name('schooladmin.educational.class.index');
    Route::get('SchoolAdmin/subject', [SubjectLmsController::class, 'index'])->name('schooladmin.educational.subject.index');
    Route::get('SchoolAdmin/chapter', [ChapterLmsController::class, 'index'])->name('schooladmin.educational.chapter.index');
    Route::get('SchoolAdmin/topic', [TopicLmsController::class, 'index'])->name('schooladmin.educational.topic.index');

    // Route to get new Medium based on the selected standard
    Route::get('/get-newstandards', 'SubTopicsController@getNewStandards')->name('get-newstandards');

    // Route to get new subjects based on the selected standard
    Route::get('/get-newsubjects', 'SubTopicsController@getNewSubjects')->name('get-newsubjects');

    // Route to get new topics based on the selected subject
    Route::get('/get-newtopics', 'SubTopicsController@getNewTopics')->name('get-newtopics');


     //Event modual
     Route::get('schoolAdmin/events',[SchoolEvController::class,'index'])->name('schooladmin.events.index');
     Route::get('schoolAdmin/events/create',[SchoolEvController::class,'create'])->name('schooladmin.events.create');
     Route::post('schoolAdmin/events/store',[SchoolEvController::class,'store'])->name('schooladmin.events.store');
     Route::get('schoolAdmin/events/edit/{id}',[SchoolEvController::class,'edit'])->name('schooladmin.events.edit');
     Route::post('schoolAdmin/events/update/{id}',[SchoolEvController::class,'update'])->name('schooladmin.events.update');
     Route::delete('schoolAdmin/events/delete/{id}',[SchoolEvController::class,'destroy'])->name('schooladmin.events.delete');

      //Event Import
    Route::get('schooladmin/importevents', function () {
        return view('schooladmin.event.importschlevent');
    })->name('schooladmin.import');
    Route::post('schooladmin/importevents', [EventImportSchlController::class, 'import'])->name('schooladmin.import.events');



     //Holiday modual
    Route::get('schoolAdmin/holiday',[SchoolHolidayController::class,'index'])->name('schooladmin.holiday.index');
    Route::get('schoolAdmin/holiday/create',[SchoolHolidayController::class,'create'])->name('schooladmin.holiday.create');
    Route::post('schoolAdmin/holiday/store',[SchoolHolidayController::class,'store'])->name('schooladmin.holiday.store');
    Route::get('schoolAdmin/holiday/edit/{id}',[SchoolHolidayController::class,'edit'])->name('schooladmin.holiday.edit');
    Route::post('schoolAdmin/holiday/update/{id}',[SchoolHolidayController::class,'update'])->name('schooladmin.holiday.update');
    Route::delete('schoolAdmin/holiday/delete/{id}',[SchoolHolidayController::class,'destroy'])->name('schooladmin.holiday.delete');


    Route::get('/import-form', [StudentController::class, 'showImportForm'])->name('import-form');
    Route::post('/import', [StudentController::class, 'import'])->name('import');

    Route::get('/teacher.import-form', [TeacherController::class, 'showImportForm'])->name('teacher.import-form');
    Route::post('/teacher.import', [TeacherController::class, 'import'])->name('teacher.import');

    // Route:: Classteacher Assign
    Route::resource('classteacherassignments', ClassTeacherAssignmentController::class);
    Route::delete('/delete-teacher/{id}', [ClassTeacherAssignmentController::class, 'destroy'])->name('classteacherassignments.destroy');
    Route::get('/get-standards/{medium_id}', [ClassTeacherAssignmentController::class, 'getStandards']);

     // Route:: SubjectTeacher Assign
    Route::resource('subjectteacherassignments', TeacherSubjectAssignController::class);
    Route::delete('/delete-teacher/{id}', [TeacherSubjectAssignController::class, 'destroy'])->name('classteacherassignments.destroy');
    Route::get('/get-standards/{medium_id}', [TeacherSubjectAssignController::class, 'getStandards']);
    Route::get('/get-teacher-subjects/{standard_id}', [TeacherSubjectAssignController::class, 'getTeacherSubjects']);

    // Route:: Attendace Report
    Route::get('attendance_report', [AttendenceController::class, 'attendanceReport'])->name('schooladmin.attendance_report.index');

    // Route::resource('schooladmin/provider_configurations', SchoolAdminProviderConfigurationController::class);
    Route::get('schooladmin/provider_configurations', [PaymentConfigurationController::class, 'index'])->name('schooladmin.providerconfigurations.index');

});

