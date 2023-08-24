<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::post('register', 'RegisterController@register')->name('register');
});
Route::get('/', 'HomeController@index')->name('home');

######routes levels######
    Route::get('/levels', 'LevelController@index')->name('levels.index');
    ######routes semesters######
    Route::get('/semesters', 'SemesterController@index')->name('semesters.index');
    ######routes units######
    Route::get('/units', 'UnitController@index')->name('units.index');
    Route::get('/units/{unit}', 'UnitController@show')->name('units.show');
    Route::get('/units/{unit}/download', 'UnitController@download')->name('units.download');
    // comments
    Route::post('units/{unit}/comments', 'Unit\CommentController@store')->name('units.comments.store');
    // quizzes
    Route::get('/units/{unit}/quizzes', 'Unit\QuizController@index')->name('units.quizzes.index');
    Route::post('/units/{unit}/quizzes', 'Unit\QuizController@store')->name('units.quizzes.store');
    ######routes comments######
    Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
    ######routes grades######
    Route::get('/grades', 'GradeController@index')->name('grades.index');
    Route::get('/grades/{quiz}', 'GradeController@show')->name('grades.show');
    ######routes profile######
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
