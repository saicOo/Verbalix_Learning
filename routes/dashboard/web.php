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

Route::group(['prefix' => 'dashboard','as' => 'dashboard.'],
function(){

    Route::group(['namespace' => 'Auth'], function () {
        // Authentication Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });
    // middleware group auth admin
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        #########routes levels#########
        Route::get('/levels', 'LevelController@index')->name('levels.index');
        ###########routes units###########
        Route::resource('units', 'UnitController');
        // routes comments unit
        Route::get('units/{unit}/comments', 'Unit\CommentController@index')->name('units.comments.index');
        Route::post('units/{unit}/comments', 'Unit\CommentController@store')->name('units.comments.store');
        // routes questions unit
        Route::get('/units/{unit}/questions', 'Unit\QuestionController@index')->name('units.questions.index');
        Route::post('/units/{unit}/questions', 'Unit\QuestionController@store')->name('units.questions.store');
        ###########routes comments###########
        Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
        ###########routes questions###########
        Route::delete('/questions/{question}', 'QuestionController@destroy')->name('questions.destroy');
        ########routes admins########
        Route::resource('admins', 'AdminController');
        #########routes students########
        Route::get('/students', 'StudentController@index')->name('students.index');
        Route::put('/students/{user}', 'StudentController@update')->name('students.update');
        // routes quizzes student
        Route::get('/students/{user}/quizzes', 'Student\QuizController@index')->name('students.quizzes.index');
        ########routes quizzes#######
        Route::get('/quizzes/{quiz}/show', 'QuizController@show')->name('quizzes.show');
    });
});
