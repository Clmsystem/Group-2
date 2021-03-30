<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        $list_item = DB::table('list_item')
            ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
            ->select('list_item.id_item', 'list_item.name_item', 'unit.unit_name')
            ->get();

        $search = [];
        $year = DB::table('year')
            ->get();
        return view('Report', compact('list_item', 'year', 'search'));
        // return view('Report', compact('year'));

    }

    public function sea(Request $request)
    {
        $quater =  $request->quater;
        $mount =  $request->mount;
        $years =  $request->input('year');
        // $values = array('quater' => $request->indicator_list, 'unit_id_unit' => $request->unit, 'year_id' => '1');

        if ($mount == 0) {
            # code...
            if ($quater == 1) {
                $getMount1 = 10;
                $getMount2 = 11;
                $getMount3 = 12;
                $getMount4 = 1;
            } else if ($quater == 2) {
                $getMount1 = 2;
                $getMount2 = 3;
                $getMount3 = 4;
                $getMount4 = 5;
            } else {
                $getMount1 = 6;
                $getMount2 = 7;
                $getMount3 = 8;
                $getMount4 = 9;
            }


            $search = DB::table('employee')
                ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
                ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                ->where('year_year_id', $request->year)
                ->where('month', $getMount1)
                ->where('month', $getMount2)
                ->where('month', $getMount3)
                ->where('month', $getMount4)
                ->get();

            // return redirect()->route('createpart4.index');
            $year = DB::table('year')
                ->get();
            return view('Report')->with('search', 'year');
            // return redirect()->route('report.index', compact('search'));
        } else {

            $search = DB::table('employee')
                ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
                ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                ->where('year_year_id', $request->input('year'))
                ->where('month', $mount)
                ->get();

            // return redirect()->route('createpart4.index');
            $year = DB::table('year')
                ->get();
            return view('Report', compact('search', 'year'));
            // return redirect()->route('report.index', compact('search'));
        }
    }
};
