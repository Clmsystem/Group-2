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
            ->join('transaction', 'list_item.id_item', '=', 'transaction.id_item')
            ->where('transaction.id_employee', $id_user)
            // ->groupBy('list_item.name_item')
            // ->having('priority.id_employee', '=', $id_user)
            ->get();
        return view('insert', compact('priority'));
    }

    public function edit(Request $request)
    {
        $id_user = session()->get('user')['id_employee'];
        $reee = $request->count;
        $desc = $request->description;
        DB::table('transaction')
            ->where('id_item', $id_user)
            ->update(['count' => $reee, 'description' => $desc]);

        return redirect()->route('submit.index')->with('success', 'created success');
    }

    public function test()
    {
        return Carbon::now()->month;
    }
}
