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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/clear-cache', function (){
//    Artisan::call('view:clear');
//    return 'route is cleared';
//});



Route::prefix('account')->name('login.')->group(function (){
    Route::get('/', 'LoginController@showLogin')->name('show');
    Route::middleware(['checkAuth'])->group(function () {
        Route::get('student', 'LoginController@student')->name('student');
        Route::get('teacher', 'LoginController@teacher')->name('teacher');
        Route::get('bursary', 'LoginController@bursary')->name('bursary');
        Route::get('principal', 'LoginController@principal')->name('principal');
        Route::get('director', 'LoginController@director')->name('director');
        Route::post('auth', 'LoginController@authenticate')->name('authenticate');

    });
});



Route::prefix('teacher')->name('teacher.')->group(function(){
    Route::middleware(['checkIfTeacher', 'checkAuth'])->group(function (){
        Route::get('/show', 'TeacherController@show')->name('show');
        Route::get('/addstudent', 'TeacherController@add')->name('add');
        Route::post('/create', 'TeacherController@create')->name('create');
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
