<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\TagController;
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
Route::post('/replies/tambahreplies','tambahreplies');
Route::put('/replies/update/{id}','updatereplies');
Route::delete('/replies/hapus/{id}','hapusreplies');
// Route::get('/saran/saran','saran')->middleware(['auth']);
});

// route tampilan login dan register untuk pengomentar
Route::get('/loginuser', function () {
    return view('loginregisteruser.login');
});
Route::get('/registeruser', function () {
    return view('loginregisteruser.register');
});

// route saran
Route::get('/saran', [SaranController::class, 'saran'])->middleware(['checkRole:admin']);

// route user
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard')->middleware(['checkRole:admin']);

// route blog
Route::resource('blog', PostController::class)->middleware(['auth'])->middleware(['checkRole:admin']);

// route tag
Route::resource('tags', TagController::class)->middleware(['auth'])->middleware(['checkRole:admin']);

require __DIR__.'/auth.php';
