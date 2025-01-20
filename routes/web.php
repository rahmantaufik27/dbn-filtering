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
    // return view('welcome');
    return view('auth/login');
});

Auth::routes();

Route::get('/dashboard-v3', 'HomeController@dashboardV3')->name('dashboard-v3');

Route::get('/student/result', 'StudentController@getIndexResult')->name('student.result');
Route::get('/student/result/per-execise', 'StudentController@perExercise')->name('student.perExercise');
Route::get('/student/result/per-student', 'StudentController@perStudent')->name('student.perStudent');
Route::get('/student/result/per-question', 'StudentController@perQuestion')->name('student.peruestion');
// Route::get('/student', 'StudentController@getIndex')->name('student');


Route::get('/student', 'StudentController@getIndex')->name('student');
Route::get('/student/data', 'StudentController@anyData')->name('student.data');

Route::get('/student/data/detail/{id}', 'StudentController@detailStudent')->name('student.detail');
Route::get('/student/data/{id}', 'StudentController@detailStudentData')->name('student.data.detail');

Route::get('/student/exercise/{id}', 'StudentController@detailExerciseStudent')->name('student.exercise');
Route::get('/student/exercise/detail/{id}', 'StudentController@detailExerciseData')->name('student.data.exercise');

// Route::get('datatables', 'StudentController@getIndex')->name('datatables');
// Route::get('datatables/data', 'StudentController@anyData')->name('datatables.data');


Route::get('/student/add', 'StudentController@addStudent')->name('add-student');
Route::post('/addStudent', 'StudentController@create')->name('edit.student');
Route::post('/updateStudent/{id}', 'StudentController@update')->name('student.update');
Route::get('/student/edit/{id}', 'StudentController@editStudent')->name('student.edit');
Route::get('/deleteStudent/{id}', 'StudentController@delete')->name('student.delete');
// Route::get('/student/{id}', 'StudentController@detailStudent')->name('student.detail');

// Route::get('/material', 'MaterialController@index')->name('material');
Route::get('/material', 'MaterialController@getIndex')->name('material');
Route::get('/material/data', 'MaterialController@anyData')->name('material.data');

Route::get('/material/add', 'MaterialController@addMaterial')->name('add-material');
Route::post('/addMaterial', 'MaterialController@createMaterial')->name('add-material');
Route::post('/updateMaterial/{id}', 'MaterialController@updateMaterial')->name('material.update');
Route::get('/editMaterial/{id}', 'MaterialController@editMaterial')->name('material.edit');
Route::get('/deleteMaterial/{id}', 'MaterialController@delete')->name('material.delete');

// Route::get('/exercise', 'ExerciseController@sameBase')->name('exercise');
// Route::get('/exercise/add', 'ExerciseController@addExercise')->name('add-exercise');
Route::get('/exercise/edit', 'ExerciseController@editExercise')->name('edit-exercise');
Route::post('/exercise/post', 'MathController@store')->name('exercise');
Route::post('/exercise/commit', 'ExerciseController@storeExerciseCommit')->name('exercise-commits');
Route::post('/exercise/result', 'ExerciseController@storeExerciseResult')->name('exercise-results');

Route::get('/profile-student', 'StudentController@profile')->name('profile');
Route::get('/profile-teacher', 'TeacherController@profile')->name('profile');
Route::get('/profile/{id}', 'StudentController@detail')->name('detail');


Route::get('/exercise', 'MathController@main')->name('math');

// uncomment to activate pagination
// Route::get('/exercise', 'MathController@getIndex')->name('exercise');
// Route::get('/exercise/data', 'MathController@main')->name('exercise.data');

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

