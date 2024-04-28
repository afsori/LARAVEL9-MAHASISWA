<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\HalamanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/mahasiswa', function () {
//     return 'mahasiswa';
// });

// Route::get('/mahasiswa/{id}', function ($id) {
//     return 'mahasiswa' . $id;
// })->where('id', '[0-9]+');
// Route::get('/mahasiswa/{id}/{nama}', function ($id, $nama) {
//     return 'mahasiswa' . $id . ' ' . $nama;
// })->where(['id' => '[0-9]+', 'nama' => '[a-zA-Z]+']);


// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
// Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'detail']);

Route::resource('/mahasiswa', MahasiswaController::class)->middleware('isLogin');

Route::get('/session', [SessionController::class, 'index']);
Route::post('/session/login', [SessionController::class, 'login']);
Route::get('/session/logout', [SessionController::class, 'logout']);

Route::get('/session/register', [SessionController::class, 'register']);
Route::post('/session/create', [SessionController::class, 'create']);


// Route::get('/', [HalamanController::class, 'index']);
Route::get('/tentang', [HalamanController::class, 'tentang']);
Route::get('/kontak', [HalamanController::class, 'kontak']);

Route::get('/', function () {
    return view('session/welcome');
})->middleware('isTamu');