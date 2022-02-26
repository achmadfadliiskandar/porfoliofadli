<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\WelcomeController;
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
// routing welcome dasar
// Route::get('/', function () {
//     return view('welcome');
// });

// route Welcome
Route::controller(WelcomeController::class)->group(function () {
Route::get('/','index');
Route::post('/welcome/store','tambah');
Route::get('/show-post/{id}/{slug}','show');
// Route::get('/saran/saran','saran')->middleware(['auth']);
});

Route::get('/saran', [SaranController::class, 'saran']);

// route user
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// route blog
Route::resource('blog', PostController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
