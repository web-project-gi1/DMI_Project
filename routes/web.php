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
	if(\Auth::user()!=null){
		return redirect('home_'.ucfirst(\Auth::user()->role));
	}
    return view('auth.login');
});

Auth::routes();


Route::get('student/export','manageController@students_export')->name('export');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home_Admin', 'HomeController@admin')->name('home_Admin')->middleware('admin');
Route::get('/home_Prof', 'HomeController@prof')->name('home_Prof')->middleware('prof');
Route::get('/home_Chef_fil', 'HomeController@chef_fil')->name('home_Chef_fil')->middleware('chef_fil');
Route::get('/home_Chef_dep', 'HomeController@chef_dep')->name('home_Chef_dep')->middleware('chef_dep');

Route::get('/AddFiliere', 'manageController@AddFiliere')->middleware('admin');
Route::post('/AddFiliere', 'manageController@AddFiliere')->middleware('admin');

Route::get('/AddModule', 'manageController@AddModule')->middleware('admin');
Route::post('/AddModule', 'manageController@AddModule')->middleware('admin');

Route::get('/AddStudent', 'manageController@AddStudent')->middleware('admin');
Route::post('/AddStudent', 'manageController@AddStudent')->middleware('admin');

Route::get('/AddAccount', 'manageController@AddAccount')->name('AddAccount')->middleware('admin');
Route::post('/AddAccount', 'manageController@AddAccount')->name('AddAccount')->middleware('admin');

Route::get('/afficheStudents/{id}', 'manageController@afficheStudents')->middleware('prof','chef_dep','chef_fil');

Route::get('/markAbsence/{id}', 'manageController@addAbsence')->middleware('prof','chef_dep','chef_fil');
Route::post('/markAbsence/{id}', 'manageController@addAbsence')->middleware('prof','chef_dep','chef_fil');

Route::get('/AddExamMark/{id}', 'manageController@AddExamMark')->middleware('prof','chef_dep','chef_fil');
Route::post('/AddExamMark/{id}', 'manageController@AddExamMark')->middleware('prof','chef_dep','chef_fil');

Route::get('/AddDSMark/{id}', 'manageController@AddDSMark')->middleware('prof','chef_dep','chef_fil');
Route::post('/AddDSMark/{id}', 'manageController@AddDSMark')->middleware('prof','chef_dep','chef_fil');

Route::get('/AffectChefFil', 'manageController@AffectChefFil')->name('AffectChefFil')->middleware('chef_dep');
Route::post('/AffectChefFil', 'manageController@AffectChefFil')->name('AffectChefFil')->middleware('chef_dep');

Route::get('/AffectProfRes', 'manageController@AffectProfRes')->name('AffectProfRes')->middleware('chef_fil');
Route::post('/AffectProfRes', 'manageController@AffectProfRes')->name('AffectProfRes')->middleware('chef_fil');

Route::get('/AffectProfEns', 'manageController@AffectProfEns')->name('AffectProfEns')->middleware('chef_fil');
Route::post('/AffectProfEns', 'manageController@AffectProfEns')->name('AffectProfEns')->middleware('chef_fil');