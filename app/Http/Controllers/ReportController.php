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
        $quater =  $request->input('quater');
        $months =  $request->input("month");
        $years =  $request->input('year');
        // $values = array('quater' => $request->indicator_list, 'unit_id_unit' => $request->unit, 'year_id' => '1');



        if ($years == 0 && $quater == 0 && $months == 0) {
            $search = DB::table('employee')
                ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
                ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                ->get();
            $list_item = [];
            $year = DB::table('year')
                ->get();
            return view('Report', compact('list_item', 'year', 'search'));
        } else if ($years == 0 && $quater > 0 && $months == 0) {

            if ($quater == 1) {
                $search = DB::table('employee')
                    ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
                    ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                    ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                    // ->where('year_year_id', $years)
                    ->where('month', '=', 10)
                    ->where('month', '=', 11)
                    ->where('month', '=', 12)
                    ->where('month', '=', 1)
                    ->get();
                $year = DB::table('year')
                    ->get();
                $list_item = [];
                return view('Report', compact('list_item', 'year', 'search'));
            } else if ($quater == 2) {
                $search = DB::table('employee')
                    ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
                    ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                    ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                    // ->where('year_year_id', $years)
                    ->where('month', '=', 2)
                    ->where('month', '=', 3)
                    ->where('month', '=', 4)
                    ->where('month', '=', 5)
                    ->get();
                $year = DB::table('year')
                    ->get();
                $list_item = [];
                return view('Report', compact('list_item', 'year', 'search'));
            } else if ($quater == 3) {
                $search = DB::table('employee')
                    ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
                    ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                    ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                    // ->where('year_year_id', $years)
                    ->where('month', '=', 6)
                    ->where('month', '=', 7)
                    ->where('month', '=', 8)
                    ->where('month', '=', 9)
                    ->get();
                $year = DB::table('year')
                    ->get();
                $list_item = [];
                return view('Report', compact('list_item', 'year', 'search'));
            }
        } else if ($years == 0 && $quater == 0 && $months != 0) {
            $search = DB::table('employee')
                ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
                ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                // ->where('year_year_id', $years)
                ->where('month', '=', $months)
                ->get();
            $year = DB::table('year')
                ->get();
            $list_item = [];
            return view('Report', compact('list_item', 'year', 'search'));
        }

















        // else if ($years == 0 && $quater != 0 && $months == 0){
        //     if ($quater == 1) {
        //         $getmonths1 = 10;
        //         $getmonths2 = 11;
        //         $getmonths3 = 12;
        //         $getmonths4 = 1;
        //     } else if ($quater == 2) {
        //         $getmonths1 = 2;
        //         $getmonths2 = 3;
        //         $getmonths3 = 4;
        //         $getmonths4 = 5;
        //     } else {
        //         $getmonths1 = 6;
        //         $getmonths2 = 7;
        //         $getmonths3 = 8;
        //         $getmonths4 = 9;
        //     }

        //     $search = DB::table('employee')
        //         ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
        //         ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
        //         ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
        //         // ->where('year_year_id', $years)
        //         ->where('month', $getmonths1)
        //         ->where('month', $getmonths2)
        //         ->where('month', $getmonths3)
        //         ->where('month', $getmonths4)
        //         ->get();
        //     $year = DB::table('year')
        //         ->get();
        //     $list_item = [];
        //     return view('Report', compact('list_item', 'year', 'search'));

        // }
        // else if ($years == 0 && $quater == 0 && $months != 0) {

        //     $search = DB::table('employee')
        //         ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
        //         ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
        //         ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
        //         ->where('month', $months)
        //         ->get();

        //     $list_item = [];
        //     $year = DB::table('year')
        //         ->get();
        //     return view('Report', compact('list_item', 'year', 'search'));
        // } 













        // if ($months == 0) {
        //     # code...
        //     if ($quater == 1) {
        //         $getMount1 = 10;
        //         $getMount2 = 11;
        //         $getMount3 = 12;
        //         $getMount4 = 1;
        //     } else if ($quater == 2) {
        //         $getMount1 = 2;
        //         $getMount2 = 3;
        //         $getMount3 = 4;
        //         $getMount4 = 5;
        //     } else {
        //         $getMount1 = 6;
        //         $getMount2 = 7;
        //         $getMount3 = 8;
        //         $getMount4 = 9;
        //     }

        //     $search = DB::table('employee')
        //         ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
        //         ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
        //         ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
        //         ->where('year_year_id', $request->year)
        //         ->where('month', $getMount1)
        //         ->where('month', $getMount2)
        //         ->where('month', $getMount3)
        //         ->where('month', $getMount4)
        //         ->get();
        //     $year = DB::table('year')
        //         ->get();
        //         $list_item = [];
        //         return view('Report', compact('list_item', 'year', 'search'));
        // } else {

        //     $search = DB::table('employee')
        //         ->join('transaction', 'employee.id_employee', '=', 'transaction.id_employee')
        //         ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
        //         ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
        //         ->where('year_year_id', $request->input('year'))
        //         ->where('month', $mount)
        //         ->get();
        //     $year = DB::table('year')
        //         ->get();
        //     $list_item = [];
        //     // return view('Report', compact('search', 'year'));
        //     return view('Report', compact('list_item', 'year', 'search'));
    }
};
