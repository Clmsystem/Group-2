<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;



class CreatePart4Controller extends Controller
{
   
    public function index(){
      
        $test=DB::table('list_item')
        ->join('year', 'list_item.year_id ', '=', 'year.year_id')
        ->join('summary', 'list_item.id_summary', '=', 'summary.id_summary')
        ->insertGetId([
            'name_item' => 'kayla@example.com',
            'id_summary' => 'test',
            'year.year' => 2016,
        ]);
        
    }
}

