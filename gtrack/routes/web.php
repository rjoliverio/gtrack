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

//Guest
Route::group([
    'namespace' => 'Guest',
    'middleware' => ['userlogged']
],function  () {
    Route::get('/', 'IndexController@index');
    Route::get('/trackcollector', 'TrackerController@tracker');
    Route::get('/announcements', 'AnnouncementController@index');
    Route::get('/seminars', 'SeminarController@index');
    Route::get('/contact-us','ContactController@index');
    Route::post('/send', 'ContactController@send');
    Route::get('/calendar', 'CalendarController@index');

});
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth','admin']
],function  () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/reports', 'ReportsController@index');
    Route::get('/reports/show/{id}', 'ReportsController@show');
    Route::post('/reports/resolve/{id}', 'ReportsController@resolve');
    Route::post('/reports/remove/{id}', 'ReportsController@remove');
    Route::get('/tracker', 'TrackerController@index');
    Route::get('/announcements', 'AdminAnnouncementController@index');
    Route::get('/events', 'EventsController@index');
    Route::post('/events/create', 'EventsController@create');
    Route::patch('/events/update/{aid}/{bid}/{cid}/{did}', 'EventsController@update');
    Route::post('/events/delete/{id}/{aid}/{bid}', 'EventsController@delete');
    Route::patch('/announcements/update/{aid}', 'AdminAnnouncementController@update');
    Route::post('/announcements/create', 'AdminAnnouncementController@create');
    Route::post('/announcements/delete/{aid}', 'AdminAnnouncementController@delete');
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile/update/{id}', 'ProfileController@update');
    Route::get('/employees','EmployeesController@index');
    Route::get('/employees/create','EmployeesController@create');
    Route::post('/employees/store','EmployeesController@store');
    Route::post('/employees/disable/{id}','EmployeesController@disable');
    Route::get('/employees/show/{id}','EmployeesController@show');
    Route::post('/employees/reactivate/{id}','EmployeesController@reactivate');
    Route::get('/gtrucks','TrucksController@index');
    Route::get('/gtrucks/create','TrucksController@create');
    Route::post('/gtrucks/store','TrucksController@store');
    Route::post('/gtrucks/maintenance/{id}','TrucksController@maintenance');
    Route::post('/gtrucks/repair/{id}','TrucksController@repair');
    Route::get('/dumpsters','DumpstersController@index');
    Route::get('/dumpsters/create','DumpstersController@create');
    Route::post('/dumpsters/store','DumpstersController@store');
    Route::get('/dumpsters/edit/{dumpter_id}/{address_id}','DumpstersController@edit');
    Route::patch('/dumpsters/{dumpter_id}/{address_id}','DumpstersController@update');
    Route::delete('/dumpsters/{dumpter_id}','DumpstersController@destroy');
});
Route::group([
    'prefix' => 'driver',
    'as' => 'driver.',
    'namespace' => 'Driver',
    'middleware' => ['auth','driver']
],function  () {
    Route::get('/schedule', 'ScheduleController@index');
    Route::get('/profile', 'ProfileController@index');
    Route::get('/weight', 'WeightController@index');
    Route::post('/profile/update/{id}', 'ProfileController@update');
    Route::get('/reports', 'ReportsController@index');
    Route::post('/reports/send', 'ReportsController@send');
    Route::post('/weight/input', 'WeightController@input');
    Route::get('/tracker', 'TrackerController@index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

