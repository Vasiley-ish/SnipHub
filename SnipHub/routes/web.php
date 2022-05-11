<?php

use App\Http\Controllers\CategorysController;
use App\Http\Controllers\UserController;
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

Route::get('/',
    [CategorysController::class, 'showIndex']    
);

Route::get('/price',
    [CategorysController::class, 'showPrice']
)->name('price');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard',
        [UserController::class, 'showDashboard']
    )->name('dashboard');

    Route::post('/dashboard/order-call',
        [UserController::class, 'orderCall']
    )->name('orderCall');

    Route::post('/dashboard/make-appointment',
    [UserController::class, 'makeAppointment']
    )->name('makeAppointment');

    Route::post('/dashboard/delete-appointment/{id}',
        [UserController::class, 'deleteAppointment']
    )->name('deleteAppointment');

    Route::post('/dashboard/make-comment',
    [UserController::class, 'makeComment']
    )->name('makeComment');

});


Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/admin', 
    [CategorysController::class, 'showAdmin']
    )->name('admin');

    Route::get('/admin/messages', 
    [CategorysController::class, 'showAdminUserMessages']
    )->name('admin-messages');

    Route::post('admin/addCategory',
        [CategorysController::class, 'createCategory']
    )->name('createCategory');
    
    Route::post('/addSubcategory',
        [CategorysController::class, 'createSubcategory']
    )->name('createSubcategory');

    Route::post('admin/deleteOutdatedAppointments',
        [CategorysController::class, 'deleteOutdatedAppointments']
    )->name('deleteOutdatedAppointments');

});


require __DIR__.'/auth.php';
