<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreatePart4Controller;

use App\Http\Controllers\ReportController;

use App\Http\Controllers\insertController;


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

Route::get('/submit', function () {
    return view('insert');
});



// Route::post('/login', [LoginController::class, 'index'])->name('login');

Route::post('/Valid', [LoginController::class,'index'],function ($argv){

} )->name('valid');

Route::get('/insertDB', [CreatePart4Controller::class,'index'],function () {
    
    
});



Route::get('/createpart4',function () {
    return view('CreatePart4');
    
});

Route::get('/report',[ReportController::class,'index']);



Route::post('/index', function () {
    return view('index');
})->name('/');

