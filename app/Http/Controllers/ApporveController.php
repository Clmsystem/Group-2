<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
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
        // $months = 0;
        return view('apporve', compact('list_item', 'year', 'years', 'search', 'months'));
        // return view('Report', compact('year'));
    }

    public function sea(Request $request)
    {
        $years = $request->year;
        $quater = $request->quater;
        $months = $request->month;

        // echo "<pre>";
        // echo $years;
        // echo $quater;
        // echo $months;
        // echo "</pre>";

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
                    ->groupBy('.transaction.id_item')
                    ->select(DB::raw('list_item.id_item,name_item,sum(count) as count,unit_name,description,name_employee,year_year_id'))
                    ->get();
            } else {
                $search = DB::table('transaction')
                    ->join('priority', 'transaction.id_item', '=', 'priority.id_item')
                    ->join('employee', 'priority.id_employee', '=', 'employee.id_employee')
                    ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                    ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                    ->where('transaction.year_year_id', '=', $years)
                    ->where('transaction.month', '=', $months)
                    ->groupBy('.transaction.id_item')
                    ->select(DB::raw('list_item.id_item,name_item,count,unit_name,description,name_employee,year_year_id'))
                    ->get();
            }


            $list_item = [];
            return view('apporve', compact('list_item', 'year', 'years', 'search', 'months'));
        }
    }
    public function confirm(Request $request)
    {
        $id = $request->id_item;
        $years = $request->year1;
        $months = $request->month1;
        $total = DB::table('transaction')
                    ->join('priority', 'transaction.id_item', '=', 'priority.id_item')
                    ->join('employee', 'priority.id_employee', '=', 'employee.id_employee')
                    ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
                    ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                    ->where('transaction.year_year_id', '=', $years)
                    ->where('transaction.month', '=', $months)
                    ->groupBy('.transaction.id_item') 
                    ->get();

        for ($i=0; $i < count($total) ; $i++) { 
            # code...
            $result[$i] = $total[$i]->count;
            if ( $result[$i] == 0  ){
                session()->flash('message' , 'Cannot be deleted');
                return redirect()->route('apporve.index')->with('alert', 'Cannot be Approve');
            }else {
                DB::table('transaction')
                ->where('id_item','=', $total[$i]->id_item)
                ->where('month',' =', $total[$i]->month ) 
                ->update(['status' => 1]);
                return redirect()->route('apporve.index')->with('success', 'created success');

            }
        }

    }
}
