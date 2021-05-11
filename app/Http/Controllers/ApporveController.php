<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApporveController extends Controller
{
    public function index(Request $request)
    {
        if ($request->mountSelect) {
            $months = $request->mountSelect;
        } else if (session()->get('mountSelect')) {
            $months = session()->get('mountSelect');
        } else {
            $months = Carbon::now()->month;
        }

        $list_item = DB::table('list_item')
            ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
            ->select('list_item.id_item', 'list_item.name_item', 'unit.unit_name')
            ->get();

        $search = [];
        $year = DB::table('year')
            ->get();

        $years = 0;
        return view('apporve', compact('list_item', 'year', 'years', 'search', 'months'));
    }

    public function sea(Request $request)
    {
        $years = $request->year;
        $months = $request->month;
        $year = DB::table('year')
            ->get();

        if ($years == 0) {
            $search = [];
            $list_item = [];
            return view('apporve', compact('list_item', 'year', 'search'));
        } else {
            if ($months == 0) {
                $search = DB::table('transaction')
                    ->join('priority', 'transaction.id_item', '=', 'priority.id_item')
                    ->join('employee', 'priority.id_employee', '=', 'employee.id_employee')
                    ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                    ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                    ->where('transaction.year_year_id', '=', $years)
                    ->groupBy('transaction.id_item')
                    ->select(DB::raw('list_item.id_item,name_item,sum(count) as count,unit_name,description,name_employee,year_year_id'))
                    ->get();
            } else {
                $search = DB::table('transaction')
                    ->join('priority', 'transaction.id_item', '=', 'priority.id_item')
                    ->join('employee', 'priority.id_employee', '=', 'employee.id_employee')
                    ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                    ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                    ->where([
                        ['transaction.year_year_id', '=', $years],
                        ['transaction.month', '=', $months],
                    ])
                    ->groupBy('transaction.id_item')
                    ->select(DB::raw('list_item.id_item,name_item,count,unit_name,description,name_employee,year_year_id'))
                    ->get();
            }


            $list_item = [];
            return view('apporve', compact('list_item', 'year', 'years', 'search', 'months'));
        }
    }
    public function confirm(Request $request)
    {
        $years = $request->year1;
        $months = $request->month1;
        $total = DB::table('transaction')
            ->where('year_year_id', '=', $years)
            ->where('month', '=', $months)
            ->groupBy('id_item')
            ->get();

        $canApproce = true;
        for ($i = 0; $i < count($total); $i++) {
            $result = $total[$i]->count;
            if ($result == 0) {
                $canApproce = false; 
            }
        }

        if ($canApproce) {
            for ($i = 0; $i < count($total); $i++) {
                DB::table('transaction')
                    ->where([
                        ['id_item', '=', $total[$i]->id_item],
                        ['month', '=', $total[$i]->month],
                        ['year_year_id', '=', $total[$i]->year_year_id],
                    ])
                    ->update(['status' => 1]);
            }
            return redirect()->route('apporve.index')->with('success', 'created success');
        } else {
            session()->flash('message', 'Cannot be Approve');
            return redirect()->route('apporve.index')->with('alert', 'Cannot be Approve');
        }
    }
}
