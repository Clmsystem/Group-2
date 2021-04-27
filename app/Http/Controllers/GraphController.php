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

        // echo "<pre>";

        // print_r($data);
        // echo "</pre>";
        return view('Graph', compact('data'));
    }
};
