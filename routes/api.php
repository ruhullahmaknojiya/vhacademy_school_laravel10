<?php

use App\Http\Controllers\Api\School\SchoolController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\StandardController;
use App\Http\Controllers\Api\Student\RegisterController;
use App\Http\Controllers\Api\Student\HomeSubjectController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SubTopicController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\Guest\StanderdController;
use App\Http\Controllers\Api\Guest\GetSubjectController;
use App\Http\Controllers\Api\Guest\GetTopicController;
use App\Http\Controllers\Api\Guest\GetSubTopicController;

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Teacher\TeacherController;

use App\Http\Controllers\Api\parent\ParentController;
use App\Http\Controllers\Api\user\FeedbackController;
use App\Http\Controllers\Api\Teacher\TimetableController;
use App\Http\Controllers\Api\Teacher\TeacherMediumToSubjects;
use App\Http\Controllers\Api\Get\GetDataController;
use App\Http\Controllers\Api\Teacher\TeacherNotification;
use App\Http\Controllers\Api\Teacher\TeacherLeaveController;
use App\Http\Controllers\Api\Teacher\TAttandaceForStudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('Studentlogin', [RegisterController::class, 'login']);
Route::post('Parentlogin', [ParentController::class, 'parent_login']);
Route::post('Teacherlogin', [TeacherController::class, 'teacher_login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/teacher/leaves', [TeacherLeaveController::class, 'getLeaves']);
    Route::post('/teacher/leaves/apply', [TeacherLeaveController::class, 'applyLeave']);
});

Route::middleware('auth:api')->group(function () {
    Route::post('/attendance/check', [TAttandaceForStudentController::class, 'checkAttendance']);
    Route::post('/attendance/submit', [TAttandaceForStudentController::class, 'submitAttendance']);
    Route::put('/attendance/update/{id}', [TAttandaceForStudentController::class, 'updateAttendance']);
    Route::get('/assigned-classes', [TAttandaceForStudentController::class, 'getAssignedClasses']);

});

Route::middleware('auth:api')->group(function () {
    
    // Route to get all mediums
    Route::get('mediums', [TeacherController::class, 'get_mediums']);
    
    // Route to get standards by medium
    Route::get('standards-by-medium', [TeacherController::class, 'get_standards_by_medium']);
    Route::get('assign-standards-by-medium', [TeacherController::class, 'get_standards_by_medium_Assignedclass_sub_wise']);

    // Route to get all classes
    Route::get('classes', [TeacherController::class, 'get_all_classes']);
    
    Route::post('/teacher/students/filter', [TeacherController::class, 'getFilteredStudentData']);
});
Route::middleware('auth:api')->get('/teacher/notices', [TeacherNotification::class, 'listNotices']);
// Route to view the details of a specific notice
Route::middleware('auth:api')->get('/teacher/notices/{id}', [TeacherNotification::class, 'noticeDetail']);
Route::middleware('auth:api')->get('/unread-notices-count', [TeacherNotification::class, 'getUnreadNoticeCount']);

//Teacher Api function and Root 
Route::middleware('auth:api')->get('/timetable', [TimetableController::class, 'getTimetable']);


//Teacher Personal Data Get Api function and Root 
Route::middleware('auth:api')->get('/teacher/data', [TeacherController::class, 'getAuthenticatedTeacherData']);



// Get Teacher Medium To Subjects Data
Route::middleware('auth:api')->get('/teacher/mediums',[TeacherMediumToSubjects::class,'teacher_get_mediums']);
Route::middleware('auth:api')->get('/teacher/standards-by-medium',[TeacherMediumToSubjects::class,'teacher_get_standards_by_medium']);
Route::middleware('auth:api')->get('teacher/assign-subjects',[TeacherMediumToSubjects::class,'teacher_get_Assign_Subjects']);
Route::get('teacher_get_class',[TeacherMediumToSubjects::class,'teacher_get_all_classes']);

//get Teacher App Homework Data
Route::middleware('auth:api')->post('/homework', [TeacherController::class, 'store']);
Route::middleware('auth:api')->get('/teacher/homeworks', [TeacherController::class, 'getTeacherHomeworks']);
Route::middleware('auth:api')->put('/homework/{id}/status', [TeacherController::class, 'updatehomeworkstatus']);

// //get data
    Route::get('get_medium',[GetDataController::class,'get_mediums']);
 Route::get('get_std',[GetDataController::class,'get_standards_by_medium']);
 Route::get('get_all_classes',[GetDataController::class,'get_all_classes']);


Route::get('get_standard',[StandardController::class,'getStandard']);
Route::get('get_subject',[SubjectController::class,'getSubject']);
Route::get('get_home_subject',[HomeSubjectController::class,'getSubjects']);
Route::get('get_topic',[TopicController::class,'getTopics']);
Route::get('get_subtopic',[SubTopicController::class,'getSubtopcs']);
Route::get('/quiz', [App\Http\Controllers\Api\QuizController::class,'index']);


Route::get('getEvents',[App\Http\Controllers\Api\School\EventController::class,'getEvents']);
Route::get('getHolidays',[App\Http\Controllers\Api\School\HolidayController::class,'getHolidays']);
Route::get('getEventHoliday',[App\Http\Controllers\Api\EventHolidayController::class,'getEventsAndHolidays']);
Route::get('getEventHolidayStudent',[App\Http\Controllers\Api\EventHolidayController::class,'getEventsAndForstudentHolidays']);



//Guest Route
Route::group(['prefix' =>'standard'],function(){
    Route::get('guest_get_standard',[StanderdController::class,'getStandard']);
});
Route::group(['prefix' =>'subject'],function(){
    Route::get('guest_get_subject',[App\Http\Controllers\Api\Guest\GetSubjectController::class,'getSubject']);
    Route::get('guest_get_rendom_subject',[App\Http\Controllers\Api\Guest\GetRendomSubjectController::class,'getSubject']);

});
Route::group(['prefix' =>'topic'],function(){
    Route::get('guest_get_topic',[GetTopicController::class,'getTopics']);
});
Route::group(['prefix' =>'subtopic'],function(){
    Route::get('guest_get_subtopic',[GetSubTopicController::class,'getSubtopcs']);
});
//




Route::middleware('auth:api')->group(function () {
    
    Route::get('/attendance', [\App\Http\Controllers\Api\Student\StudentDataController::class, 'getAttendance']);
    Route::get('getStudent-Data', [\App\Http\Controllers\Api\Student\StudentDataController::class, 'getStudent']);
    Route::post('update_medium', [\App\Http\Controllers\Api\Student\StudentDataController::class, 'updateStudentMedium']);
    Route::get('/student_homework_data', [App\Http\Controllers\Api\Student\StudentDataController::class, 'getStudentHomeworkData']);
    Route::get('/student_homework_data', [App\Http\Controllers\Api\Student\StudentDataController::class, 'getStudentHomeworkData']);
    Route::get('/student_Timetable_data', [App\Http\Controllers\Api\Student\StudentDataController::class, 'getStudentTimetable']);

});

