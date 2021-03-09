<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function index(Request $request)
    {
  
        $email = $request->input('email');
        $pass = $request->input('password');
        $users = DB::table('user')
                ->where('user_name', '=',$email )
                ->where('password','=',$pass)
                ->get();

        $result = json_decode($users, true);

        if (count($users)>0){
            
            if ($result[0]['status_level1']=1){
                return view("index",$users);
                return view('partials.nav',$result);
                return view('partials.sidebar',$result);
                
            }
            else{
                return view("menu.content");
            }
        }
        else{
            echo "pls check pass or email";
            return view('index');
            echo $result;
        }
        
        
    }
    



   
}
