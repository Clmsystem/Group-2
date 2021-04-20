<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class ApporveController extends Controller
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
        return view('apporve', compact('list_item', 'year', 'search'));
        // return view('Report', compact('year'));
    }

    public function sea(Request $request)
    {
        $years = $request->year;
        $months = $request->month;

        if ($years == 0) {
            $search = [];
            $list_item = [];
            $year = [];
            return view('apporve', compact('list_item', 'year', 'search'));
        } else {
            $search = DB::table('employee')
                ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
                ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                ->where('year_year_id', $years)
                ->get();

            $year = DB::table('year')
                ->get();

            $list_item = [];
            return view('apporve', compact('list_item', 'year', 'search'));
        }
    }
}
