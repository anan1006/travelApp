<?php

use App\Models\Tour;
use App\Models\Discover;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $discovers = Discover::all();
    $tours = Tour::all();
    return view('landing',compact('discovers','tours'));
})->name('landingPage');

// Tour
Route::middleware(['auth', 'verified','role:superadmin|admin'])->group(function(){
    // Kelola Tour
    Route::get('/rencana-tour', [TourController::class, 'index'])->name('tourPlan');
    Route::get('/rencana-tour/tambah', [TourController::class, 'create'])->name('createPlan');
    Route::post('/rencana-tour/tambah', [TourController::class, 'store'])->name('storePlan');
    // Route::get('/rencana-tour/detil/{plan}', [TourController::class, 'show'])->name('showPlan');
    Route::get('/rencana-tour/edit/{plan}', [TourController::class, 'edit'])->name('editPlan');
    Route::post('/rencana-tour/update/{plan}', [TourController::class, 'update'])->name('updatePlan');
    Route::get('/rencana-tour/delete/{plan}', [TourController::class, 'destroy'])->name('deletePlan');


    // Hapus Meeting Point
    Route::delete('/hapusMeetPoint/{meetPoint}', [TourController::class, 'hapusMeetPoint'])->name('hapusMeetingPoint');
    // Hapus Destination
    Route::delete('/hapusDestination/{destination}', [TourController::class, 'hapusDestination'])->name('hapusDestination');
    // Hapus Schedule
    Route::delete('/hapusSchedule/{schedule}', [TourController::class, 'hapusSchedule'])->name('hapusSchedule');



    // User
    Route::get('/user-list', [UserController::class, 'index'])->name('userList');
    Route::get('/user-list/detail/{user}', [UserController::class, 'show'])->name('showUser');
    Route::get('/user-list/tambah', [UserController::class, 'create'])->name('tambahUser');
    Route::post('/user-list/tambah', [UserController::class, 'store'])->name('simpanUser');
    Route::get('/user-list/edit/{user}', [UserController::class, 'edit'])->name('editUser');
    Route::post('/user-list/update/{user}', [UserController::class, 'update'])->name('updateUser');
    Route::get('/user-list/hapus/{user}', [UserController::class, 'hapus'])->name('hapusUser');

    // Discover
    Route::resource("/discover",DiscoverController::class)->names('discover');

});



// Route::get('/dashboard', function(){
//     return view('layouts.modernize.main');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified','role:superadmin|admin|user'])->group(function () {
    Route::get('/dashboard', function(){
        return view('layouts.modernize.main');
    })->name('dashboard');
    // DAFTAR TOUR
    Route::get('/daftar-rencana-tour', [TourController::class, 'rencanaTourList'])->name('rencanaTourList');

    Route::get('/rencana-tour/detil/{plan}', [TourController::class, 'show'])->name('showPlan');

    Route::get("/order",[OrderController::class,"index"])->name("order");
    Route::get("/order/showOrder/{plan}",[OrderController::class,"showOrder"])->name("showOrder");


    // USER DAFTAR TOUR
    Route::get('/daftar/{plan}',[TourController::class,"daftar"])->name("userDaftar");
    Route::post('/daftar',[TourController::class,"daftarPost"])->name("userDaftarPost");
    Route::get('/setujui/{user}/{tour}',[OrderController::class,"setujui"])->name("setujui");
    Route::get('/tolak/{user}/{tour}',[OrderController::class,"tolak"])->name("tolak");
});



require __DIR__.'/auth.php';
