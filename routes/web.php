<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\PiloteController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\CompanionController;
use App\Http\Controllers\EventRegisterController;
use App\Http\Controllers\DrivingLicenceController;
use App\Http\Controllers\OrderController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware(['auth'])->group(function(){


    // Dashboard
    Route::get('/dashboard', function () {return Inertia::render('Dashboard');})->name('dashboard');

    // DrivingLicence Route
    Route::post('/driving_licence', [DrivingLicenceController::class,'store'])->name('driving_licence.store');

    // Event Routes
    Route::get('/allevents', [EventController::class,'index'])->name('event.index');
    Route::get('/showevent/{id}', [EventController::class,'show'])->name('event.show');
    Route::get('/createevent/{id}', [EventRegisterController::class,'create'])->name('event_register.create');

    Route::post('/storeevent/{id}/{event_id}', [EventRegisterController::class,'storeEventRegister'])->name('event_register.store');

    // Paiement Routes
    Route::get('/createpaiement/{event}', [PaiementController::class,'create'])->name('paiement.create');
    Route::post('/validatepaiement/{event}', [PaiementController::class,'billingStore'])->name('paiement.store');

    // Order Routes
    Route::get('/orderlist', [OrderController::class, 'show'])->name('orders.show');



    // Garage Routes
    Route::get('/garage', [GarageController::class,'index'])->name('garage.index');

    // Car Routes
    Route::post('/cars', [CarController::class,'store'])->name('car.store');
    Route::delete('/cardestroy/{id}', [CarController::class,'destroy'])->name('car.destroy');


    // Companion Routes
    Route::post('/companions', [CompanionController::class,'store'])->name('companion.store');
    Route::delete('/companiondestroy/{id}', [CompanionController::class,'destroy'])->name('companion.destroy');


    // Pilotes Routes
    Route::post('/pilotes', [PiloteController::class,'store'])->name('pilote.store');
    Route::delete('/pilotedestroy/{id}', [PiloteController::class,'destroy'])->name('pilote.destroy');

    // Admin Routes
    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {

        Route::get('/admin', [AdminController::class,'index'])->name('index');
        Route::get('/adminusers', [AdminController::class,'indexUsers'])->name('index.users');
        Route::get('/adminuser/{id}', [AdminController::class,'showUser'])->name('show.user');
        Route::put('/adminuserupdate/{id}', [AdminController::class,'userUpdate'])->name('user.update');
        Route::put('/admincarupdate/{id}', [AdminController::class,'carUpdate'])->name('car.update');
        Route::put('/adminpiloteupdate/{id}', [AdminController::class,'piloteUpdate'])->name('pilote.update');
        Route::delete('/adminuserdestroy/{id}', [AdminController::class,'userDestroy'])->name('user.destroy');

        Route::get('/adminevents', [AdminController::class,'indexEvents'])->name('index.events');
        Route::post('/admineventstore', [EventController::class,'store'])->name('event.store');
        Route::get('/adminevent/{id}', [EventController::class,'eventShow'])->name('event.show');
        Route::put('/admineventupdate/{id}', [EventController::class,'eventUpdate'])->name('event.update');
        Route::delete('/admineventdestroy/{id}', [EventController::class,'destroy'])->name('event.destroy');


    });

});




