<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear', function() {    
    Artisan::call('cache:clear');    
    Artisan::call('config:cache');    
    Artisan::call('view:clear');  
    Artisan::call('route:clear');     
    return "Cache cleared.";
});

Route::group([
    'namespace' => 'Site',
    'as'        => 'site.'
], function() {
    Route::group([
        'controller' => HomeController::class
    ], function() {
        Route::get('/', 'index')->name('home.index');
        Route::get('/last-news', 'getLastNews')->name('home.news');
    });

    Route::group([
        'controller' => EventController::class
    ], function() {
        Route::get('/events', 'index')->name('events.index');
        Route::get('/events/{slug}', 'show')->name('events.show');
    });

    Route::group([
        'controller' => NewsController::class
    ], function() {
        Route::get('/news', 'index')->name('news.index');
        Route::get('/news/{slug}', 'show')->name('news.show');
    });

    Route::group([
        'controller' => ApplicantController::class
    ], function() {
        Route::get('/applicants', 'index')->name('applicants.index');
    });

    Route::group([
        'controller' => EmployerController::class
    ], function() {
        Route::get('/employers', 'index')->name('employers.index');
    });
});

Route::group([
    'middleware'    => ['role:admin'],
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'as'            => 'admin.'
], function() {
    Route::group([
        'controller' => HomeController::class
    ], function() {
        Route::get('/', 'index')->name('home.index');
    });
    Route::group(['controller' => NewsController::class], function() {
        Route::get('/all-news', 'getAllNews')->name('news.all');
    });
    Route::resource('news', NewsController::class);
    Route::resource('events', EventController::class);
});

require __DIR__.'/auth.php';
