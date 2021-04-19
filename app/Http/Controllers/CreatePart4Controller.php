<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;



class CreatePart4Controller extends Controller
{


    public function index()
    {
        if (session()->get('user')) {

            $list_item = DB::table('list_item')
                ->leftjoin('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                ->leftjoin('priority', 'list_item.id_item', '=', 'priority.id_item')
                ->leftjoin('employee', 'priority.id_employee', '=', 'employee.id_employee')
                ->select('list_item.id_item', 'list_item.name_item', 'unit.unit_name', DB::raw('GROUP_CONCAT(name_employee) as name_employee'))
                ->orderBy('list_item.id_item')
                ->groupBy('list_item.name_item')
                ->get();
            $units = DB::table('unit')
                ->get();

            $employee = DB::table('employee')
                ->where('id_department', '=', 2)
                ->get();

            return view('CreatePart4', compact('list_item', 'units', 'employee'));
        } else {
            return redirect('login');
        }
    }

    public function testr()
    {
        return view('login');
    }

    public function showResponsiblePerson()
    {
        $ResponsiblePerson = DB::table('employee')
            ->where('id_department', '=', 2)
            ->get();
    }

    public function update(Request $request)
    {

        // print_r($request);
        DB::transaction(function () use ($request) {
            DB::table('list_item')
                ->where('id_item', $request->value_of_item)
                ->update(['name_item' => $request->indicator_list, 'unit_id_unit' => $request->unit]);

            if (!empty($request->employee)) {

                DB::table('priority')
                    ->where('id_item', $request->value_of_item)
                    ->delete();

                foreach ($request->employee as $key => $value) {
                    $dataI[$key]['id_item'] = $request->value_of_item;
                    $dataI[$key]['id_employee'] = $value;
                }
                DB::table('priority')
                    ->insert($dataI);
            } else {

                DB::table('priority')
                    ->where('id_item', $request->value_of_item)
                    ->delete();
            }
        });


        return redirect()->route('createpart4.index');
    }

    public function destoyy(Request $request)
    {
        echo $request->indicator_list;
        echo "emp " . $request->employee;
        echo "count " . $request->count;
        echo "unit " . $request->unit;
        echo "id " . $request->id_item;
    }

    public function store(Request $request)
    {

        $values = array('name_item' => $request->indicator_list, 'unit_id_unit' => $request->unit, 'year_id' => '1');

        DB::table('list_item')->insert($values);

        return redirect()->route('createpart4.index')->with('success', 'created success');
    }
};
