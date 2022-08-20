<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ImageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use \App\Http\Controllers\AbonnementController;
use \App\Http\Controllers\CompletProfileController;

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
    return view('welcome');
});

Route::get('/dashboard', function () { 
    return view('dashboard');
})->middleware(['auth', 'completed_profile', 'abonnement'])->name('dashboard');


Route::middleware(['auth', 'artisan_profile'])->group(function(){
    // complete profile
    Route::get('/artisan/completprofile',[CompletProfileController::class, 'index'])->name('artisan.completProfile');
    Route::post('/artisan/completprofile',[CompletProfileController::class, 'store'])->name('artisan.completProfile.store');
    
    //abonnement 
    Route::get('/artisan/abonnement', [AbonnementController::class, 'index'])->name('artisan.abonnement.index');
    Route::post('/artisan/abonnement', [AbonnementController::class, 'store'])->name('artisan.abonnement.store');
    
    Route::middleware(['completed_profile', 'abonnement'])->group(function(){
        //update profile
        Route::get('/artisan/mettre_a_jours_le_profil', [CompletProfileController::class, 'edit'])->name('artisan.completProfile.edit');
        Route::put('/artisan/mettre_a_jours_le_profil', [CompletProfileController::class, 'update'])->name('artisan.completProfile.update');
    
        //add photo a album
        Route::get('/artisan/image', [ImageController::class, 'index'])->name('artisan.image.index');
        Route::post('/artisan/image', [ImageController::class, 'store'])->name('artisan.image.store');
    
    });

});

// Route::middleware(['auth', 'client_profile'])->group(function({

// }));
Route::get('artisan/list', [ClientController::class, 'artisanList'])->name('artisan.list');
Route::get('artisan/detail/{user}', [ClientController::class, 'artisanDetail'])->name('artisan.detail');
Route::post('artisan/note/{user}', [CommentController::class, 'store'])->middleware('auth', 'client_profile')->name('artisan.note');



require __DIR__.'/auth.php';
