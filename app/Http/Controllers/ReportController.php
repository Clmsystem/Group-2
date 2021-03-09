<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;



class ReportController extends Controller
{
    public function index(){
         return view('Report');
        
    }
}

