<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreatePart4Controller;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\ApporveController;

use App\Http\Controllers\insertController;
use App\Http\Controllers\FileUploadController;

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


// Route::post('/login', [LoginController::class, 'index'])->name('login');

Route::post('/Valid', [LoginController::class, 'index'], function ($argv) {
})->name('test');

Route::get('/insertDB', [CreatePart4Controller::class, 'index'], function () {
});

Route::resource('submit', insertController::class);
Route::post('/updateCount', [insertController::class, 'edit']);
Route::post('/submit', [insertController::class, 'index']);


Route::resource('report', ReportController::class);
Route::post('/sea', [ReportController::class, 'sea']);

Route::resource('createpart4', CreatePart4Controller::class);

Route::post('/createpart4/store', [CreatePart4Controller::class, 'store']);

Route::post('/createpart4/delete', [CreatePart4Controller::class, 'delete_row']);

// Route::get('/createpart4', [CreatePart4Controller::class, 'index']);


Route::get('/graph', [GraphController::class, 'index']);

Route::resource('/apporve', ApporveController::class);
Route::post('/apporvePost',[ApporveController::class,'sea'] );
Route::post('/confirm',[ApporveController::class,'confirm'] );



Route::post('/index', function () {
    return view('index');
})->name('/');

// Route::get('file-upload', [FileUploadController::class, 'index']);
// Route::post('store', [FileUploadController::class, 'store']);
Route::get('file-upload', [FileUploadController::class, 'index'])->name('file.upload');
Route::post('file-upload', [FileUploadController::class, 'store'])->name('file.upload.post');
Route::get('file/download', [FileUploadController::class, 'getfile']);
Route::get('file-upload', [FileUploadController::class, 'store'])->name('file.upload.get');
