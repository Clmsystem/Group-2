<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ApporveController extends Controller
{
    public function index()
    {
        $list_item = DB::table('list_item')->get();
        return view('apporve', compact('list_item'));
    }

}
