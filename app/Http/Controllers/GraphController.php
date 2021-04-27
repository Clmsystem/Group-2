<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;



class GraphController extends Controller
{

    public function index()
    {
        $id_item = $_GET['id'];
        $year_item = $_GET['year'];
        $data = DB::table('transaction')
            ->where('id_item', '=', $id_item)
            ->where('year_year_id', '=', $year_item)
            ->select('count', 'month')
            ->get();

        $m0 = $data[0]->count;
        $m1 = $data[1]->count;
        $m0 = $data[2]->count;
        $m3 = $data[3]->count;
        $m4 = $data[4]->count;
        $m5 = $data[5]->count;
        $m6 = $data[6]->count;
        $m7 = $data[7]->count;
        $m8 = $data[8]->count;
        $m9 = $data[9]->count;
        $m10 = $data[10]->count;
        $m11 = $data[11]->count;
        return view('Graph', compact('m0', 'm1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11'));
    }
};
