<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// User Routes

Route::get('/', function () {
    return view('welcome');
});





Auth::routes();


Route::get('/', 'HomeController@index')->name('home');


// Admin Routes

Route::group(['middleware' => ['auth','Admin'] ], function () {

    Route::get('admin',function (){

     return redirect('admin/dashboard');

    });

    Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('home');

	Route::resource('admin/admins', 'Admin\AdminController', ['except' => ['show']]);

    Route::resource('admin/users', 'Admin\UserController', ['except' => ['show']]);

    Route::resource('admin/tracks', 'Admin\TrackController');

    Route::resource('admin/track.course', 'Admin\TrackCourseController');

    Route::resource('admin/courses', 'Admin\CourseController');

    Route::resource('admin/course.video', 'Admin\CourseVideoController');

    Route::resource('admin/course.quiz', 'Admin\CourseQuizController');

    Route::resource('admin/videos', 'Admin\VideoController');

    Route::resource('admin/quizzes', 'Admin\QuizController');

    Route::resource('admin/quiz.question', 'Admin\QuizQuestionController');

    Route::resource('admin/questions', 'Admin\QuestionController',['except' => ['show']]);

    Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);

	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);

	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);

});



