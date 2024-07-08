<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StandardController;
use App\Http\Controllers\Api\Student\RegisterController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SubTopicController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\Guest\StanderdController;
// use App\Http\Controllers\Api\Guest\GetSubjectController;
use App\Http\Controllers\Api\Guest\GetTopicController;
use App\Http\Controllers\Api\Guest\GetSubTopicController;
use App\Http\Controllers\Api\Guest\GetRendomSubjectController;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Teacher\TeacherController;

use App\Http\Controllers\Api\parent\ParentController;
use App\Http\Controllers\Api\user\FeedbackController;
use App\Http\Controllers\Api\Teacher\TimetableController;
use App\Http\Controllers\Api\get\getDataController;

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

Route::post('/signup', [RegisterController::class, 'register']);
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp']);
Route::post('login', [RegisterController::class, 'login']);

//parent
Route::post('/parent_signup', [ParentController::class, 'register']);
// Route::post('/verify-otp', [RegisterController::class, 'verifyOtp']);
Route::post('parent_login', [ParentController::class, 'login']);


//get data
Route::get('get_mediums',[getDataController::class,'get_mediums']);
Route::get('get_std',[getDataController::class,'get_standards_by_medium']);
Route::get('get_all_classes',[getDataController::class,'get_all_classes']);


Route::get('get_standard',[StandardController::class,'getStandard']);
Route::get('get_subject',[SubjectController::class,'getSubject']);
Route::get('get_home_subject',[\App\Http\Controllers\Api\HomeSubjectController::class,'getSubjects']);
Route::get('get_topic',[TopicController::class,'getTopics']);
Route::get('get_subtopic',[SubTopicController::class,'getSubtopcs']);

Route::get('/quiz', [App\Http\Controllers\Api\QuizController::class,'index']);


Route::get('getEvents',[App\Http\Controllers\Api\School\EventController::class,'getEvents']);
Route::get('getHolidays',[App\Http\Controllers\Api\School\HolidayController::class,'getHolidays']);
Route::get('getEventHoliday',[App\Http\Controllers\Api\EventHolidayController::class,'getEventsAndHolidays']);


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
    Route::get('/parent_data', [ParentController::class, 'getdata']);
    Route::post('/parent_update', [ParentController::class, 'update']);
    Route::post('/parent_update_password', [ParentController::class, 'changePassword']);
    Route::post('/user_feedback', [FeedbackController::class, 'userFeedBack']);
    Route::get('getStudent-Data', [\App\Http\Controllers\Api\Student\StudentDataController::class, 'getStudent']);
    Route::post('update_medium', [\App\Http\Controllers\Api\Student\StudentDataController::class, 'updateStudentMedium']);

});
Route::middleware('auth:api')->group(function () {
    Route::get('/student_homework_data', [App\Http\Controllers\Api\Student\StudentDataController::class, 'getStudentHomeworkData']);

});
//teacher

Route::post('teacher_login', [TeacherController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::get('/timetable_data', [TimetableController::class, 'getTimetable']);
    Route::post('/homework_insert', [TeacherController::class, 'store']);
    Route::post('/homework_submition/{id}', [TeacherController::class, 'updatehomeworkstatus']);
    Route::get('/homeworkdata', [TeacherController::class, 'gethomeworkdata']);
    Route::get('/filter_student_data', [TeacherController::class, 'getFilteredStudentData']);
    Route::post('/check_attendance', [TeacherController::class, 'check_attendance']);
    Route::post('/store_attendance', [TeacherController::class, 'store_attendance']);


});
