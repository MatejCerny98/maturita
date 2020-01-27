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
Route::group(['middleware' => ['isAdmin']], function () {
    Route::get('/ucivo/{ucivo}', 'UcivoController@destroy')->name('ucivo.destroy');
    Route::get('/ucivo/{ucivo}/edit', 'UcivoController@edit')->name('ucivo.edit');
    Route::put('/ucivo/{ucivo}', 'UcivoController@update')->name('ucivo.update');
    Route::post('/users/{user}/change-role/{role}', 'UsersController@changeRole')->name('users.changerole');
    Route::resource('users', 'UsersController')->except(['create', 'store']);
});
Route::group(['middleware' => ['isTeacher']], function () {
    Route::get('/ucivo/create', 'UcivoController@create')->name('ucivo.create');
    Route::put('/ucivo/{ucivo}', 'UcivoController@update')->name('ucivo.update');
    Route::delete('/ucivo/{ucivo}', 'UcivoController@destroy')->name('ucivo.destroy');
    Route::get('/ucivo/{ucivo}', 'UcivoController@show')->name('ucivo.show');
    Route::get('/ucivo/{ucivo}/edit', 'UcivoController@edit')->name('ucivo.edit');
    Route::post('/users/{user}/change-role/{role}', 'UsersController@changeRole')->name('users.changerole');
    Route::resource('users', 'UsersController')->except(['create', 'store']);
});
Route::group(['middleware' => ['isStudent']], function () {
    Route::get('/ucivo', 'UcivoController@index')->name('ucivo.index');
    Route::get('/ucivo/{ucivo}', 'UcivoController@show')->name('ucivo.show');
});
//Route::post('/users/{user}/change-role/{role}', 'UsersController@changeRole')->name('users.changerole');

Route::get('/', function () {
    return view('homepage');
})->name('home');
Route::post('/ucivo', 'UcivoController@store')->name('ucivo.store');


Route::get('/testController', function () {
    return view('test');
})->name('test');

Route::get('/učivo', 'UcivoController@index')->name('učivo');


Route::get('/vytvorucivo', function () {
    return view('vytvorucivo');
})->name('vytvorucivo');



Route::get('/home');

Auth::routes();

Route::get('/test', 'testController@index')->name('test.index');
Route::get('/test/{id}', 'testController@show')->name('test.show');
Route::get('/vytvortest', 'testController@create')->name('test.create');
Route::post('/test', 'testController@store')->name('test.store');
Route::post('/test/{id}/validate', 'testController@validateTest')->name('test.validate');
Route::get('/znamky', 'testController@grades')->name('test.grades');
Route::post('/test/{id}/start', 'testController@start')->name('test.start');
Route::post('/test/{id}/stop', 'testController@stop')->name('test.stop');
Route::post('/group/{userid}/add', 'GroupController@add')->name('group.add');


//Route::resource('ucivo', 'UcivoController');
//Route::get('/ucivo', 'UcivoController@index')->name('ucivo.index');
//Route::post('/ucivo', 'UcivoController@store')->name('ucivo.store');
//Route::get('/ucivo/create', 'UcivoController@create')->name('ucivo.create');
//Route::put('/ucivo/{ucivo}', 'UcivoController@update')->name('ucivo.update');
//Route::delete('/ucivo/{ucivo}', 'UcivoController@destroy')->name('ucivo.destroy');
//Route::get('/ucivo/{ucivo}', 'UcivoController@show')->name('ucivo.show');
//Route::get('/ucivo/{ucivo}/eidt', 'UcivoController@edit')->name('ucivo.edit');
//Route::resource('users', 'UsersController')->except(['create', 'store']);
