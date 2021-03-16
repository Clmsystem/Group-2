<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;



class insertController extends Controller
{
    public function index()
    {
        $indicator = DB::table('indicator')->get();
        return view('insert', compact('indicator'));
    }

    public function test()
    {
        return
            DB::table('indicator')->get();
    }
}
