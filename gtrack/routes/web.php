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
    Route::get('/profile', 'ProfileController@index');
});
Route::group([
    'prefix' => 'driver',
    'as' => 'driver.',
    'namespace' => 'Driver',
    'middleware' => ['auth','driver']
],function  () {
    Route::get('/schedule', 'ScheduleController@index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


