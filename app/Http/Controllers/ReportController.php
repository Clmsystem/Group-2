<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReportController extends Controller
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
        return view('Report', compact('list_item', 'year', 'years', 'search', 'months'));
        // return view('Report', compact('year'));
    }

    public function sea(Request $request)
    {
        echo"<pre>";
            print_r($_GET);
            print_r($_POST);
            
        echo "</pre>";
        // $years = $request->year;
        // $quater = $request->quater;
        // $months = $request->month;


        // $year = DB::table('year')
        //     ->get();

        // if ($years == 0) {
        //     $search = [];
        //     $list_item = [];
        //     return view('Report', compact('list_item', 'year', 'search'));
        // } else {
        //     if ($months == 0) {
        //         $search = DB::table('transaction')
        //             ->join('priority', 'transaction.id_item', '=', 'priority.id_item')
        //             ->join('employee', 'priority.id_employee', '=', 'employee.id_employee')
        //             ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
        //             ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
        //             ->where('transaction.year_year_id', '=', $years)
        //             ->groupBy('transaction.id_item')
        //             ->select(DB::raw('list_item.id_item,name_item,sum(count) as count,unit_name,description,name_employee,year_year_id'))
        //             ->get();
        //     } else {
        //         $search = DB::table('transaction')
        //             ->join('priority', 'transaction.id_item', '=', 'priority.id_item')
        //             ->join('employee', 'priority.id_employee', '=', 'employee.id_employee')
        //             ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
        //             ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
        //             ->where('transaction.year_year_id', '=', $years)
        //             ->where('transaction.month', '=', $months)
        //             ->groupBy('transaction.id_item')
        //             ->select(DB::raw('list_item.id_item,name_item,count,unit_name,description,name_employee,year_year_id'))
        //             ->get();
        //     }
    

        //     $list_item = [];
        //     return view('Report', compact('list_item', 'year', 'years', 'search', 'months'));
        // }
    }
    public function download(Request $request)
    {
        $years = $request->year;
        $months = $request->month;
        $tasks = DB::table('transection')
            ->join('priority', 'transaction.id_item', '=', 'priority.id_item')
            ->join('employee', 'priority.id_employee', '=', 'employee.id_employee')
            ->join('list_item', 'transaction.id_item', '=', 'list_item.id_item')
            ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
            ->where('transaction.year_year_id', '=', $years)
            ->where('transaction.month', '=', $months)
            ->groupBy('transaction.id_item')
            ->select(DB::raw('list_item.id_item,name_item,count,unit_name,description,name_employee,year_year_id'))
            ->get();

        print_r($tasks);
        // $fileName = 'tasks.csv';
        // $headers = array(
        //     "Content-type"        => "text/csv",
        //     "Content-Disposition" => "attachment; filename=$fileName",
        //     "Pragma"              => "no-cache",
        //     "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        //     "Expires"             => "0"
        // );

        // $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');

        // $callback = function() use($tasks, $columns) {
        //     $file = fopen('php://output', 'w');
        //     fputcsv($file, $columns);

        //     foreach ($tasks as $task) {
        //         $row['Title']  = $task->title;
        //         $row['Assign']    = $task->assign->name;
        //         $row['Description']    = $task->description;
        //         $row['Start Date']  = $task->start_at;
        //         $row['Due Date']  = $task->end_at;

        //         fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
        //     }

        //     fclose($file);
        // };

        // return response()->stream($callback, 200, $headers);
    }
};
