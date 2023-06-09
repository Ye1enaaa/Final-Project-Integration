<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventAttendeesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventDetailsController;
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', [UserController::class, 'userMobile']);
});

//------------------------------LOGIN & REGISTER MOBILE------------------------------------\\
Route::post('/login' , [LoginController::class, 'loginMobile']);
Route::post('/register' , [LoginController::class,'registerMobile']);

//-------------------------ATTENDANCE MONITORING APIs-----------------------------\\
Route::get('/student/{studentId}' , [UserController::class, 'getuser']);
Route::post('/attendance/{event_id}' , [EventAttendeesController::class, 'addAttendees']);
Route::get('/getattendance' , [EventAttendeesController::class,'getDatawithAttendee']);//Experiment
Route::get('/eventname/{id}' , [EventAttendeesController::class,'fetchEventData']); //Fetch By ID

//---------------------------FOR STUDENT------------------------------\\
Route::get('/events' , [EventController::class, 'index']); //all events
Route::get('/eventtoday', [EventController::class, 'fetchEventToday']); //fetch event today
Route::get('/upcomingevents', [EventController::class, 'fetchUpcomingEvents']); //fetch upcoming events
Route::get('/endedevents', [EventController::class, 'fetchEndedEvents']); // fetch ended events
Route::get('/event/{id}/attendee/{studentId}' , [UserController::class,'checkIfAttended']);
Route::get('/event/attendance/{studentId}' , [EventAttendeesController::class,'fetchAllEventsWithAttendee']);

//------------------------EXPERIMENTATION APIs-------------------------\\
Route::delete('/delete/{id}',[EventController::class,'destroy']);
Route::get('/adminevent/{id}', [EventDetailsController::class, 'showEventDetails']);