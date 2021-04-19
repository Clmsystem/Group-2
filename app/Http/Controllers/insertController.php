<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class insertController extends Controller
{
    public function index(Request $request)
    {
        if ($request->mountSelect) {
            $month = $request->mountSelect;
        } else if (session()->get('mountSelect')) {
            $month = session()->get('mountSelect');
        } else {
            $month = Carbon::now()->month;
        }

        $input = $request->all();
        $id_user = session()->get('user')['id_employee'];
        $priority = DB::table('priority')
            ->join('list_item', 'priority.id_item', '=', 'list_item.id_item')
            ->join('transaction', 'list_item.id_item', '=', 'transaction.id_item')
            ->where('priority.id_employee', $id_user)
            ->where('transaction.month', $month)
            ->get();
        return view('insert', compact('priority', 'month'));
    }

    public function edit(Request $request)
    {
        $count = $request->count;
        $desc = $request->description;
        $id_item = $request->id_item;
        $mountSelect = $request->month;

        DB::table('transaction')
            ->where('id_item', $id_item)
            ->update(['count' => $count, 'description' => $desc]);

        return redirect()->route('submit.index')->with('mountSelect', $mountSelect);
    }
}
