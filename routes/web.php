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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/lapangan', 'HomeController@lapangan')->name('home.lapangan');
Route::get('/club', 'HomeController@club')->name('home.club');
Route::get('/detail/lapangan/{id}', 'HomeController@detail_lapangan')->name('detail.lapangan');
Route::get('/detail/club/{id}', 'HomeController@detail_club')->name('detail.club');
Route::post('/review', 'HomeController@post_review')->name('post.review');
Route::get('/difable-mode/{mode}', 'HomeController@difable_mode')->name('home.difable_mode');



//Master
Route::group(['prefix' => 'master', 'middleware' => ['auth','role:admin-access'], 'as'=>'master'], function() {

    //Dashboard
    Route::get('/', 'Master\DashboardController@index')->name('.dashboard');

    //Lapangan
    Route::group(['prefix' => 'lapangan', 'as'=>'.lapangan'], function() {
        Route::get('/', 'Master\LapanganController@index')->name('.manage');
        Route::get('/create', 'Master\LapanganController@create')->name('.create');
        Route::post('/create', 'Master\LapanganController@store')->name('.store');
        Route::get('/edit/{id}', 'Master\LapanganController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Master\LapanganController@update')->name('.update');
        Route::get('/detail/{id}', 'Master\LapanganController@show')->name('.show');

        Route::group(['prefix' => 'foto', 'as'=>'.foto'], function() {
            Route::get('/{id}', 'Master\LapanganController@foto_index')->name('.manage');
            Route::get('/create/{id}', 'Master\LapanganController@foto_create')->name('.create');
            Route::post('/create/{id}', 'Master\LapanganController@foto_store')->name('.store');
            Route::get('/destroy/{id}', 'Master\LapanganController@foto_destroy')->name('.delete');
        });

    });

    //Club
    Route::group(['prefix' => 'club', 'as'=>'.club'], function() {
        Route::get('/', 'Master\ClubController@index')->name('.manage');
        Route::get('/create', 'Master\ClubController@create')->name('.create');
        Route::post('/create', 'Master\ClubController@store')->name('.store');
        Route::get('/edit/{id}', 'Master\ClubController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Master\ClubController@update')->name('.update');
        Route::get('/detail/{id}', 'Master\ClubController@show')->name('.show');

        Route::group(['prefix' => 'foto', 'as'=>'.foto'], function() {
            Route::get('/{id}', 'Master\ClubController@foto_index')->name('.manage');
            Route::get('/create/{id}', 'Master\ClubController@foto_create')->name('.create');
            Route::post('/create/{id}', 'Master\ClubController@foto_store')->name('.store');
            Route::get('/destroy/{id}', 'Master\ClubController@foto_destroy')->name('.delete');
        });

	    Route::group(['prefix' => 'prestasi', 'as'=>'.prestasi'], function() {
		    Route::get('/{id}', 'Master\ClubController@prestasi_index')->name('.manage');
		    Route::get('/create/{id}', 'Master\ClubController@prestasi_create')->name('.create');
		    Route::post('/create/{id}', 'Master\ClubController@prestasi_store')->name('.store');
		    Route::get('/destroy/{id}', 'Master\ClubController@prestasi_destroy')->name('.delete');
	    });

    });

    //Reviews
    Route::group(['prefix' => 'review', 'as'=>'.review'], function() {
        Route::get('/', 'Master\ReviewController@index')->name('.manage');
        Route::post('/approve', 'Master\ReviewController@approve')->name('.approve');
        Route::post('/reject', 'Master\ReviewController@reject')->name('.reject');
    });

    //Schedule
    Route::group(['prefix' => 'schedule', 'as'=>'.schedule'], function() {
        Route::get('/', 'Master\ScheduleController@index')->name('.manage');
        Route::get('/create', 'Master\ScheduleController@create')->name('.create');
        Route::post('/create', 'Master\ScheduleController@store')->name('.store');
        Route::get('/edit/{id}', 'Master\ScheduleController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Master\ScheduleController@update')->name('.update');
        Route::post('/approve', 'Master\ScheduleController@approve')->name('.approve');
        Route::post('/forceapprove', 'Master\ScheduleController@force_approve')->name('.force_approve');
        Route::post('/reject', 'Master\ScheduleController@reject')->name('.reject');
    });

    //Admin
    Route::group(['prefix' => 'admin', 'as'=>'.admin'], function() {
        Route::get('/', 'Master\AdminController@index')->name('.manage');
        Route::get('/create', 'Master\AdminController@create')->name('.create');
        Route::post('/create', 'Master\AdminController@store')->name('.store');
        Route::get('/edit/{id}', 'Master\AdminController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Master\AdminController@update')->name('.update');
    });

    //My Account
    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Master\ProfileController@edit')->name('.edit');
        Route::post('/', 'Master\ProfileController@update')->name('.update');
    });

    
});


//Operator
Route::group(['prefix' => 'operator', 'middleware' => ['auth','role:operator-access'], 'as'=>'operator'], function() {

    //Dashboard
    Route::get('/', 'Operator\DashboardController@index')->name('.dashboard');
    Route::post('/', 'Operator\DashboardController@update')->name('.update');
    
    //Foto
    Route::group(['prefix' => 'foto', 'as'=>'.foto'], function() {
        Route::get('/', 'Operator\FotoController@index')->name('.manage');
        Route::get('/create', 'Operator\FotoController@create')->name('.create');
        Route::post('/create', 'Operator\FotoController@store')->name('.store');
        Route::get('/destroy/{id}', 'Operator\FotoController@destroy')->name('.delete');
    });

	//Prestasi
	Route::group(['prefix' => 'prestasi', 'as'=>'.prestasi'], function() {
		Route::get('/', 'Operator\PrestasiController@index')->name('.manage');
		Route::get('/create', 'Operator\PrestasiController@create')->name('.create');
		Route::post('/create', 'Operator\PrestasiController@store')->name('.store');
		Route::get('/destroy/{id}', 'Operator\PrestasiController@destroy')->name('.delete');
	});

    //Schedule
    Route::group(['prefix' => 'schedule', 'as'=>'.schedule'], function() {
        Route::get('/', 'Operator\ScheduleController@index')->name('.manage');
        Route::get('/create', 'Operator\ScheduleController@create')->name('.create');
        Route::post('/create', 'Operator\ScheduleController@store')->name('.store');
        Route::get('/edit/{id}', 'Operator\ScheduleController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Operator\ScheduleController@update')->name('.update');
        Route::get('/detail/{id}', 'Operator\ScheduleController@show')->name('.show');
    });

    //News
    Route::group(['prefix' => 'news', 'as'=>'.news'], function() {
        Route::get('/', 'Operator\NewsController@index')->name('.manage');
        Route::get('/create', 'Operator\NewsController@create')->name('.create');
        Route::post('/create', 'Operator\NewsController@store')->name('.store');
        Route::get('/edit/{id}', 'Operator\NewsController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Operator\NewsController@update')->name('.update');
        Route::get('/detail/{id}', 'Operator\NewsController@show')->name('.show');
    });
});
