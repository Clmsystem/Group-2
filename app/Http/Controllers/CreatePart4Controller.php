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
                ->join('unit', 'list_item.unit_id_unit', '=', 'unit.id_unit')
                ->select('list_item.id_item', 'list_item.name_item', 'unit.unit_name')
                ->get();

            $units = DB::table('unit')
                // ->select('unit*')
                ->get();
            return view('CreatePart4', compact('list_item', 'units'));
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


        DB::table('list_item')
            ->where('id_item', $request->value_of_item)
            ->update(['name_item' => $request->indicator_list]);


        foreach ($request->employee as $key => $value) {

            print_r($value);
            DB::table('priority')
                ->insert(
                    ['id_item' => $request->value_of_item, 'id_employee' => $value]
                );
        }
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
