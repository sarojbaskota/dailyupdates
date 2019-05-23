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
// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes([
    'register' => false,
]);
/*
|--------------------------------------------------------------------------
| ADMINISTRATION
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'administration','middleware' => ['Admin']], function(){
    Route::get('/dashboard','DashboardController@admin');
    Route::get('/scrums','ScrumsController@adminIndex');
    Route::resource('/users','UsersController');
    Route::post('/users/{id}','UsersController@update');
    Route::post('/users/status/{id}','UsersController@changeStatus');
    Route::get('/scrums/{id}','ScrumsController@adminTask');
    Route::post('/scrum/employee','ScrumsController@adminScrumstore');
    Route::post('/employee/Scrums-update','ScrumsController@adminTaskUpdate');
    Route::get('/scrums/history/{id}','ScrumsController@adminScrumHistory');
    Route::get('/updates/history/{id}','ScrumsController@adminUpdatesHistory');
    Route::get('/updates','DailyUpdatesController@infoEmployeeUpdate');
    Route::get('/updates/{id}','DailyUpdatesController@historyEmployeeUpdate');
    Route::post('/leave/response/{id}','ScrumsController@leaveResponseStore');
    Route::get('/leave/histroy','UsersController@leaveHistroy');
}); 
/*
|--------------------------------------------------------------------------
| EMPLOYEE
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'employee','middleware' => ['Employee']], function(){
    Route::get('/dashboard','DashboardController@employee');
    Route::resource('/users','UsersController');
    Route::post('/users/{id}','UsersController@update');
    Route::get('/updates','DailyUpdatesController@myInfoEmployeeUpdate');
    Route::get('/updates/history','DailyUpdatesController@myHistoryEmployeeUpdate');
    Route::post('/updates/store','DailyUpdatesController@employeeUpdateStore');
    Route::get('/scrums/history','ScrumsController@employeeTaskHistory');
    Route::get('/scrums/history','ScrumsController@myHistoryEmployeeScrums');
    Route::post('/leave/request','ScrumsController@leaveRequestStore');
    Route::post('/leave/request/seen/{id}','ScrumsController@leaveResponseSeen');
    Route::get('/leave/response/{id}', 'ScrumsController@leaveResponse');

    Route::post('/profile/{id}', 'UsersController@changePassword');
}); 
