<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreatePart4Controller;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\ApproveController;

use App\Http\Controllers\insertController;
use App\Http\Controllers\FileUploadController;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
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

try {


    Route::get('/', function () {
        if (session()->has('user')) {
            return view("index");
        } else {
            return view('login');
        }
    });

    Route::get('/logout', function () {
        session()->forget('user');
        return view('login');
    });


    // Route::post('/login', [LoginController::class, 'index'])->name('login');

    Route::post('/Valid', [LoginController::class, 'index'], function ($argv) {
    })->name('test');
    // Route::match(['get'], '/Valid', function () {
    //     return redirect('/');
    // });

    Route::get('/insertDB', [CreatePart4Controller::class, 'index'], function () {
    })->middleware('AuthLogin');

    Route::resource('submit', insertController::class)->middleware('AuthLogin');
    Route::post('/updateCount', [insertController::class, 'edit'])->middleware('AuthLogin');
    Route::post('/submit', [insertController::class, 'index'])->middleware('AuthLogin');


    Route::resource('report', ReportController::class)->middleware('AuthLogin');
    Route::post('/sea', [ReportController::class, 'sea'])->middleware('AuthLogin');

    Route::resource('createpart4', CreatePart4Controller::class)->middleware('AuthLogin');

    Route::post('/createpart4/store', [CreatePart4Controller::class, 'store'])->middleware('AuthLogin');

    Route::post('/createpart4/delete', [CreatePart4Controller::class, 'delete_row'])->middleware('AuthLogin');

    // Route::get('/createpart4', [CreatePart4Controller::class, 'index']);


    Route::get('/graph', [GraphController::class, 'index'])->middleware('AuthLogin');

    Route::resource('/approve', ApproveController::class)->middleware('AuthLogin');
    Route::post('/approvePost', [ApproveController::class, 'sea'])->middleware('AuthLogin');
    Route::post('/confirm', [ApproveController::class, 'confirm'])->middleware('AuthLogin');
    Route::get('/get_graph', [GraphController::class, 'test'])->middleware('AuthLogin');



    Route::get('/index', function () {
        return view('index');
    });

    // Route::get('file-upload', [FileUploadController::class, 'index']);
    // Route::post('store', [FileUploadController::class, 'store']);
    Route::get('file-upload', [FileUploadController::class, 'index'])->name('file.upload')->middleware('AuthLogin');
    Route::post('file-upload', [FileUploadController::class, 'store'])->name('file.upload.post')->middleware('AuthLogin');
    Route::get('file/download', [FileUploadController::class, 'getfile'])->middleware('AuthLogin');
    Route::get('file-upload', [FileUploadController::class, 'store'])->name('file.upload.get')->middleware('AuthLogin');
}

//catch exception
catch (Exception $e) {
    return redirect('/');
}
