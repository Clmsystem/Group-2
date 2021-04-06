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
            ->join('transaction', 'transaction.id_item', '=', 'list_item.id_item')
            ->where('priority.id_employee', $id_user)
            // ->groupBy('priority.id_item')
            ->get();
        return view('insert', compact('priority'));
    }

    public function edit(Request $request)
    {
        $reee = $request->count;
        $desc = $request->description;
        DB::table('transaction')
            ->where('id_item', 5)
            ->update(['count' => $reee, 'description' => $desc]);

        return redirect()->route('submit.index')->with('success', 'created success');
    }

    public function test()
    {
        return Carbon::now()->month;
    }
}
