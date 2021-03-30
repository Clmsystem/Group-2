<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class insertController extends Controller
{
    public function index()
    {
        $id_user = session()->get('user')['id_employee'];
        $priority = DB::table('priority')
            ->join('list_item', 'priority.id_item', '=', 'list_item.id_item')
            // ->join('transaction', 'list_item.id_item', '=', 'transaction.id_item')
            ->where('id_employee', $id_user)
            ->get();
        return view('insert', compact('priority'));
    }

    public function edit(Request $request)
    {
        $id_user = session()->get('user')['id_employee'];

        $values = array('id_item' => $request->id_item, 'count' => $request->count, 'id_employee' => $id_user, 'description' => $request->description, 'month' => 1, 'year_year_id' => 1);

        DB::table('transaction')->insert($values);

        return redirect()->route('submit.index')->with('success', 'created success');
    }

    public function test()
    {
        return Carbon::now()->month;
    }
}
