<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;



class CreatePart4Controller extends Controller
{
   
    public function index(){
      
        $test=DB::table('list_item')
        ->insertGetId([
            'name_item' => 'สถิติการยืมต่อทรัพยากรสารสนเทศผ่านระบบ RFID',
            'year_id' => 2564,
        ]);
        return view('CreatePart4');
    }
   
};

