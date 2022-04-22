<?php

use App\Http\Controllers\CategorysController;
use App\Http\Controllers\DataController;
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
    [DataController::class, 'showIndex']    
);

Route::get('/price',
    [DataController::class, 'showPrice']
)->name('price');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard',
        [DataController::class, 'showDashboard']
    )->name('dashboard');

    Route::post('/dashboard/submit',
        [CategorysController::class, 'createMessage']
    )->name('submitMessage');

    Route::get('/dashboard/submit/{id}',
        [CategorysController::class, 'deleteMessage']
    )->name('delete');

});


Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/admin', 
    [DataController::class, 'showAdmin']
    )->name('admin');

    Route::get('/admin/messages', 
    [DataController::class, 'showAdminUserMessages']
    )->name('admin-messages');

    Route::post('admin/addCategory',
        [CategorysController::class, 'createCategory']
    )->name('createCategory');
    
    Route::post('/addSubcategory',
        [CategorysController::class, 'createSubcategory']
    )->name('createSubcategory');

    Route::post('/seen/{id}',
        [CategorysController::class, 'markAsSeen']
    )->name('seen');

});


require __DIR__.'/auth.php';
