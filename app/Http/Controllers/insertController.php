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
            ->where('id_employee', $id_user)
            ->get();
        return view('insert', compact('priority'));
    }


    public function test()
    {
        return Carbon::now()->month;
    }
}
