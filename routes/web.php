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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\School\TeacherAssign\ClassTeacherAssignmentController;
use App\Http\Controllers\School\Attendence\AttendenceController;
use App\Http\Controllers\School\TeacherSubjectAssign\TeacherSubjectAssignController;
use App\Http\Controllers\School\Notice\NoticeController;
use App\Http\Controllers\School\TeacherLeave\TeacherLeaveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\School\Fees\InvoiceController;

use App\Http\Controllers\School\Fees\FeeManagementController;


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

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['middlware' => ['auth', 'role:SuperAdmin']], function () {


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
    Route::get('superadmin/Subject', [SubjectController::class, 'index'])->name('subjects');
    Route::get('superadmin/create-Subject', [SubjectController::class, 'create'])->name('create_Subject');
    Route::post('superadmin/save-Subject', [SubjectController::class, 'store'])->name('save_Subject');
    Route::get('superadmin/edit-Subject/{id}', [SubjectController::class, 'edit'])->name('edit_Subject');
    Route::post('superadmin/update-Subject/{id}', [SubjectController::class, 'update'])->name('update_Subject');
    Route::delete('superadmin/delete-Subject/{id}', [SubjectController::class, 'destroy'])->name('delete_Subject');
    // Route::get('/get-standards/{mediumId}', [SubjectController::class,'getStandards'])->name('getstandard');
    Route::get('/getnewstandard/{mediumId}', [SubjectController::class, 'getStandards'])->name('getstandard');
    Route::get('/get-newstandards/{medium_id}', [SubjectController::class, 'getStandards'])->name('getnewestandard');

    //School_Topics modual
    Route::get('superadmin/Chapter', [TopicsController::class, 'index'])->name('topics');
    Route::get('superadmin/create-Chapter', [TopicsController::class, 'create'])->name('create_topic');
    Route::post('superadmin/save-Chapter', [TopicsController::class, 'store'])->name('save_topic');
    Route::get('superadmin/edit-Chapter/{id}', [TopicsController::class, 'edit'])->name('edit_topic');
    Route::post('superadmin/update-Chapter/{id}', [TopicsController::class, 'update'])->name('update_topic');
    Route::delete('superadmin/delete-Chapter/{id}', [TopicsController::class, 'destroy'])->name('delete_topic');
    Route::get('/getstandards/{mediumId}', [TopicsController::class, 'getStandards'])->name('get-standards');
    Route::get('/get-subjects/{standardId}', [TopicsController::class, 'getSubjects'])->name('get-subjects');


    //School_SubTopics modual
    Route::get('superadmin/SubTopics', [SubTopicsController::class, 'index'])->name('subtopics.index');
    Route::get('superadmin/create-SubTopics', [SubTopicsController::class, 'create'])->name('create_subtopics');
    Route::post('superadmin/save-SubTopics', [SubTopicsController::class, 'store'])->name('save_subtopics');
    Route::get('superadmin/edit-SubTopics/{id}', [SubTopicsController::class, 'edit'])->name('edit_subtopics');
    Route::post('superadmin/update-SubTopics/{id}', [SubTopicsController::class, 'update'])->name('update_subtopics');
    Route::delete('superadmin/delete-SubTopics/{subTopicId}', [SubTopicsController::class, 'destroy'])->name('delete_subtopics');
    Route::get('get_standards/{mediumId}', [SubTopicsController::class, 'getStandards'])->name('get_standards');
    Route::get('get_subjects/{standardId}', [SubTopicsController::class, 'getSubjects'])->name('get_subjects');
    Route::get('get_topics/{subjectId}', [SubTopicsController::class, 'getTopics'])->name('get_topics');
    Route::get('get_subtopics/{topicId}', [SubTopicsController::class, 'getSubTopics'])->name('get_subtopics');
    // Route::get('get-newstandards', [SubjectController::class, 'getNewStandards'])->name('get-newstandards');
    // Route to get new standards based on the selected medium
    Route::get('/get-newstandards', 'SubTopicsController@getNewStandards')->name('get-newstandards');

    // Route to get new subjects based on the selected standard
    Route::get('/get-newsubjects', 'SubTopicsController@getNewSubjects')->name('get-newsubjects');

    // Route to get new topics based on the selected subject
    Route::get('/get-newtopics', 'SubTopicsController@getNewTopics')->name('get-newtopics');

    //Event modual
    Route::get('superadmin/events', [EventController::class, 'index'])->name('superadmin.events.index');
    Route::get('superadmin/events/create', [EventController::class, 'create'])->name('superadmin.events.create');
    Route::post('superadmin/events/store', [EventController::class, 'store'])->name('superadmin.events.store');
    Route::get('superadmin/events/edit/{id}', [EventController::class, 'edit'])->name('superadmin.events.edit');
    Route::post('superadmin/events/update/{id}', [EventController::class, 'update'])->name('superadmin.events.update');
    Route::delete('superadmin/events/delete/{id}', [EventController::class, 'destroy'])->name('superadmin.events.delete');

    //Event Import
    Route::get('superadmin/importevents', function () {
        return view('superadmin.events.importevent');
    })->name('superadmin.import');
    Route::post('superadmin/importevents', [EventNewImportController::class, 'import'])->name('superadmin.import.events');

    //home_course
    //School_subject modual
    Route::get('superadmin/homesubject', [HomeSubjectController::class, 'index'])->name('superadmin.homesubject.index');
    Route::get('superadmin/homesubject/create', [HomeSubjectController::class, 'create'])->name('superadmin.homesubject.create');
    Route::post('superadmin/homesubject/store', [HomeSubjectController::class, 'store'])->name('superadmin.homesubject.store');
    Route::get('superadmin/homesubject/edit/{id}', [HomeSubjectController::class, 'edit'])->name('superadmin.homesubject.edit');
    Route::post('superadmin/homesubject/update/{id}', [HomeSubjectController::class, 'update'])->name('superadmin.homesubject.update');
    Route::delete('superadmin/homesubject/delete/{id}', [HomeSubjectController::class, 'destroy'])->name('superadmin.homesubject.destroy');
});

Route::group(['middlware' => ['auth', 'role:SchoolAdmin']], function () {

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
    Route::get('SchoolAdmin/teachers/{id}', [TeacherController::class, 'show'])->name('schooladmin.teachers.show');



    //teacher time table
    Route::get('SchoolAdmin/Teacher/Timetable', [TeacherTimeController::class, 'index'])->name('teacher.timetable.index');
    Route::get('SchoolAdmin/Teacher/Create-Timetable', [TeacherTimeController::class, 'create'])->name('teacher_timetable');
    Route::post('SchoolAdmin/Teacher/Save-Timetable', [TeacherTimeController::class, 'store'])->name('teacher_timetable_insert');
    Route::get('SchoolAdmin/Teacher/Edit-Timetable/{id}', [TeacherTimeController::class, 'edit'])->name('teacher_timetable_edit');
    Route::get('SchoolAdmin/Teacher/Show-Timetable/{id}', [TeacherTimeController::class, 'show'])->name('teacher_timetable_show');

    Route::post('SchoolAdmin/Teacher/Update-Timetable/{id}', [TeacherTimeController::class, 'update'])->name('teacher_timetable_update');
    Route::delete('SchoolAdmin/Teacher/Delete-Timetable/{id}', [TeacherTimeController::class, 'destroy'])->name('teacher_timetable_delete');
    Route::get('standards/{mediumId}', [TeacherTimeController::class, 'standards'])->name('teacher_standard');
    Route::get('/subjects/{standardId}', [TeacherTimeController::class, 'subjects'])->name('teacher_subjects');
    Route::get('teacher/timetable/{id}/pdf', 'TeacherTimetableController@generatePDF')->name('teacher.timetable.pdf');

    //** Fee Collection Route ***
    // Combined route for creating and listing master fee categories
    Route::get('SchoolAdmin/fee-management/master-fee-categories', [FeeManagementController::class, 'manageMasterFeeCategories'])
        ->name('feemanagement.manageMasterFeeCategories');

    Route::post('SchoolAdmin/fee-management/master-fee-categories/store', [FeeManagementController::class, 'storeMasterFeeCategory'])
        ->name('feemanagement.storeMasterFeeCategory');

    Route::get('fee-categories', [FeeManagementController::class, 'manageFeeCategories'])->name('manageFeeCategories');
    Route::post('fee-categories/store', [FeeManagementController::class, 'storeFeeCategory'])->name('storeFeeCategory');
    Route::get('get-classes/{mediumId}', [FeeManagementController::class, 'getClassesByMedium'])->name('getClassesByMedium');
    Route::get('/schooladmin/fees', [FeeManagementController::class, 'showFeeCategories'])->name('feemanagement.index');
    Route::get('/get-class-fees/{classId}', [FeeManagementController::class, 'getClassFees'])->name('getClassFees');
    Route::get('/schooladmin/showStudents-class-wise', [FeeManagementController::class, 'showStudents'])->name('showStudentsByClassWise');
    Route::get('/get-class-students/{class_id}', [FeeManagementController::class, 'fetchStudentsClassWise'])->name('fetchStudentsClassWise');
    Route::get('/fetch-master-fee-categories', [FeeManagementController::class, 'fetchMasterFeeCategories'])->name('fetchMasterFeeCategories');

    Route::post('/submit-fees-payment/{student_id}', [FeeManagementController::class, 'submitStudentFeesPayment'])->name('submitStudentFeesPayment');
    // Route::post('/submit-payment/{student_id}', [FeeManagementController::class, 'submitPayment'])->name('submit.payment');

    Route::get('/fetch-standards', [FeeManagementController::class, 'fetchStandards'])->name('fetch.standards');
    Route::get('/fetch-students/{standardId}', [FeeManagementController::class, 'fetchStudents'])->name('fetch.students');

    Route::get('/schooladmin/fees-payment-history', [FeeManagementController::class, 'fees_payment_history'])->name('fees-payment-history');

    Route::get('/get-master-fee-categories/{student_id}/{standard_id}', [FeeManagementController::class, 'getMasterFeeCategories'])->name('getMasterFeeCategories');
    Route::post('/update-fees', [FeeManagementController::class, 'updateFees']);


    Route::get('/generate-invoice-pdf/{studentId}/{classId}/{categoryName}', [InvoiceController::class, 'generateInvoicePDF'])
        ->name('generateInvoicePDF');
        Route::get('/student-school-fee.details/{student_id}', [FeeManagementController::class, 'showFeeDetails'])->name('student-school-fee.details');


    Route::get('/fees-payment-history/invoice-all', [InvoiceController::class, 'generateInvoiceAll'])->name('fees.invoice.all');

    Route::get('/fees-payment-history/invoice/{id}', [InvoiceController::class, 'generateInvoicePdfSingleRecords'])->name('fees.invoice.pdf');

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
    Route::get('schoolAdmin/events', [SchoolEvController::class, 'index'])->name('schooladmin.events.index');
    Route::get('schoolAdmin/events/create', [SchoolEvController::class, 'create'])->name('schooladmin.events.create');
    Route::post('schoolAdmin/events/store', [SchoolEvController::class, 'store'])->name('schooladmin.events.store');
    Route::get('schoolAdmin/events/edit/{id}', [SchoolEvController::class, 'edit'])->name('schooladmin.events.edit');
    Route::post('schoolAdmin/events/update/{id}', [SchoolEvController::class, 'update'])->name('schooladmin.events.update');
    Route::delete('schoolAdmin/events/delete/{id}', [SchoolEvController::class, 'destroy'])->name('schooladmin.events.delete');

    //Event Import
    Route::get('schooladmin/importevents', function () {
        return view('schooladmin.event.importschlevent');
    })->name('schooladmin.import');
    Route::post('schooladmin/importevents', [EventImportSchlController::class, 'import'])->name('schooladmin.import.events');



    //Holiday modual
    Route::get('schoolAdmin/holiday', [SchoolHolidayController::class, 'index'])->name('schooladmin.holiday.index');
    Route::get('schoolAdmin/holiday/create', [SchoolHolidayController::class, 'create'])->name('schooladmin.holiday.create');
    Route::post('schoolAdmin/holiday/store', [SchoolHolidayController::class, 'store'])->name('schooladmin.holiday.store');
    Route::get('schoolAdmin/holiday/edit/{id}', [SchoolHolidayController::class, 'edit'])->name('schooladmin.holiday.edit');
    Route::post('schoolAdmin/holiday/update/{id}', [SchoolHolidayController::class, 'update'])->name('schooladmin.holiday.update');
    Route::delete('schoolAdmin/holiday/delete/{id}', [SchoolHolidayController::class, 'destroy'])->name('schooladmin.holiday.delete');


    Route::get('/import-form', [StudentController::class, 'showImportForm'])->name('import-form');
    Route::post('/import', [StudentController::class, 'import'])->name('import');

    Route::get('/teacher.import-form', [TeacherController::class, 'showImportForm'])->name('teacher.import-form');
    Route::post('/teacher.import', [TeacherController::class, 'import'])->name('teacher.import');

    Route::resource('classteacherassignments', ClassTeacherAssignmentController::class);
    Route::delete('/delete-class-teacher/{id}', [ClassTeacherAssignmentController::class, 'destroy'])->name('classteacherassignments.destroy');
    Route::get('/get-class-standards/{medium_id}', [ClassTeacherAssignmentController::class, 'getClassStandards']);
    Route::get('attendance_report', [AttendenceController::class, 'attendanceReport'])->name('schooladmin.attendance_report.index');

    // Route:: SubjectTeacher Assign
    Route::resource('subjectteacherassignments', TeacherSubjectAssignController::class);
    Route::delete('/delete-subject-teacher/{id}', [TeacherSubjectAssignController::class, 'destroy'])->name('teachersubjectassign.destroy');
    Route::get('/get-standards/{medium_id}', [TeacherSubjectAssignController::class, 'getStandards']);
    Route::get('/get-teacher-subjects/{standard_id}', [TeacherSubjectAssignController::class, 'getTeacherSubjects']);

    Route::get('/admin/notices', [NoticeController::class, 'index'])->name('schooladmin.notices.index');
    // Route to display the form for creating a new notice
    Route::get('/schoolAdmin/notices/create', [NoticeController::class, 'create'])->name('schooladmin.notices.create');

    // Route to store the newly created notice
    Route::post('/schoolAdmin/notices', [NoticeController::class, 'store'])->name('schooladmin.notices.store');

    // Route to display a list of all notices with counters for views
    Route::get('/schoolAdmin/notices', [NoticeController::class, 'index'])->name('schooladmin.notices.index');

    // Route to display the report of how many users viewed a specific notice
    Route::get('/schoolAdmin/notices/{id}/report', [NoticeController::class, 'report'])->name('schooladmin.notices.report');

    Route::delete('/schooladmin/notices/{id}', [NoticeController::class, 'destroy'])->name('schooladmin.notices.destroy');

    Route::get('/attendance-report/{student_id}', [AttendenceController::class, 'show'])->name('schooladmin.attendance_report.show');

    Route::get('teacher_leaves', [TeacherLeaveController::class, 'index'])->name('schooladmin.teacher_leaves.index');
    //Route::get('teacher_leaves/{id}/edit', [TeacherLeaveController::class, 'edit'])->name('schooladmin.teacher_leaves.edit');
    Route::post('/schooladmin/teacher_leaves/update/{id}', [TeacherLeaveController::class, 'update'])->name('schooladmin.teacher_leaves.update');
});
