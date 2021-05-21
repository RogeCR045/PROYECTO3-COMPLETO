<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ContactController;
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

Route::get('/exportAnimalsToCSV', [AnimalController::class, 'exportAnimalsToCSV'])->name('/exportAnimalsToCSV');
Route::get('/exportContactsToCSV', [ContactController::class, 'exportContactsToCSV'])->name('/exportContactsToCSV');
Route::get('/exportProfessionsToCSV', [ProfessionController::class, 'exportProfessionsToCSV'])->name('/exportProfessionsToCSV');
Route::get('/exportMusicsToCSV', [MusicController::class, 'exportMusicsToCSV'])->name('/exportMusicsToCSV');
Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'musics' => MusicController::class,
    'professions'=>ProfessionController::class,
    'animals'=>AnimalController::class,
    'contacts'=>ContactController::class,
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
