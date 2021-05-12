<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    public function index()
    {
      $currentYear = DB::table('year')
      ->where('flag',1)
      ->select('year_id')
      ->get();
      $currentYear= $currentYear[0]->year_id; 

      $year = DB::table('year')
      ->get();
      $years ='';
      return view('Management',compact('currentYear','year','years'));
    }
    public function manageted(Request $request)
    {
      // dd($request);
      $Addyear = $request->Addyear;
      $Flagyear = $request->Flagyear;
      $currentYear = DB::table('year')
      ->where('flag', 1)
      ->select('year_id')
      ->get();
      $year = DB::table('year')
      ->get();
      $yearname = $year->year;
      dd($Addyear,$Flagyear);
      if (isset($_POST["btn_Add"])) {
          if (in_array($Addyear,$yearname)) {
            return redirect()->route('Management.index')->with('alert', 'Have already');
          }
          else{
                  $dataYeartoinsert['year'] = $Addyear;
                  $dataYeartoinsert['flag'] = 0;
            DB::table('year')
                  ->insert($dataYeartoinsert);
          }
        
        
      }
      else{

      }
    }
}
