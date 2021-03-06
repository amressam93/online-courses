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

Route::get('/','HomeController@index')->name('home');


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/course/{slug}/{id}','CourseController@index')->name('single_course');

Route::post('/course/{slug}/{id}','CourseController@enroll_course')->name('enroll_course')->middleware(['auth']);

Route::get('/lesson/{slug}/{courseId}','CourseController@courseLessons')->name('course_lessons')->middleware(['auth','AccessCourseLessons']);  // here

Route::get('/course/{slug}/quizzes/{quizName}','QuizController@index')->name('course_quizzes')->middleware(['auth']); // here

Route::post('/course/{slug}/quizzes/{quizName}','QuizController@store')->name('course_quizzes')->middleware(['auth']);  // here

Route::get('/courses/search/','CourseSearchController@index')->name('course_search');

Route::get('/courses/filter/','CourseSearchController@filter')->name('course_filter');

Route::get('/tracks','TrackController@all_tracks')->name('all_tracks');

Route::get('/tracks/{name}','TrackController@index')->name('track_courses');

Route::post('/tracks/load_data/{track_name}', 'TrackController@load_data')->name('tracks.load_data');

Route::post('/tracks/filter/{track_name}', 'TrackController@filter')->name('tracks.filter');

Route::get('/my-courses','MyCoursesController@index')->name('my-courses');

Route::get('/profile','ProfileController@index')->name('profile')->middleware(['auth','Student']);

Route::post('/profile','ProfileController@update_image')->name('update-profile-image')->middleware(['auth','Student']);

Route::delete('/profile-image','ProfileController@delete_image')->name('delete-profile-image')->middleware(['auth','Student']);

Route::get('/all-courses','allCoursesController@index')->name('all_courses');

Route::get('/load-more-all-courses','allCoursesController@load_more_data')->name('load_more_all_courses');

Route::get('/all-courses-filter','allCoursesController@filter')->name('all-courses-filter');

// Admin Routes

Route::group(['middleware' => ['auth','Admin'] ], function () {

    Route::get('admin',function (){

     return redirect('admin/dashboard');

    });

    Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('home');

	Route::resource('admin/admins', 'Admin\AdminController', ['except' => ['show']]);

    Route::resource('admin/users', 'Admin\UserController', ['except' => ['show']]);

    Route::resource('admin/tracks', 'Admin\TrackController');

    Route::resource('admin/levels', 'Admin\CourseLevelController');

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



