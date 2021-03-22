<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;



class CreatePart4Controller extends Controller
{

    public function index()
    {
        $list_item = DB::table('list_item')->get();
        return view('CreatePart4', compact('list_item'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);

        // Post::create($request->all());
        $values = array('name_item' => $request->indicator_list, 'unit_id_unit' => $request->unit, 'year_id' => '1');

        DB::table('list_item')->insert($values);

        return redirect()->route('createpart4.index')->with('success', 'created success');

        //  insert
        // $values = array('id' => 1, 'name' => 'Dayle');
        // DB::table('users')->insert($values);
    }
};
