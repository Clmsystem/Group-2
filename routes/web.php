<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreatePart4Controller;
<<<<<<< Updated upstream
use App\Http\Controllers\ReportController;
=======
use App\Http\Controllers\insertController;
>>>>>>> Stashed changes

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
    return view('login');
});

// Route::get('/insert', function () {
//     return view('pages.insert.index');
// });



// Route::post('/login', [LoginController::class, 'index'])->name('login');


// Route::post('/Valid', [LoginController::class,'index'],function ($argv){

// } )->name('valid');
Route::get('/createpart4',[CreatePart4Controller::class,'index']);
<<<<<<< Updated upstream
Route::get('/report',[ReportController::class,'index']);

=======
Route::get('/insert',[insertController::class,'index']);
>>>>>>> Stashed changes
Route::post('/index', function () {
    return view('index');
})->name('/');

