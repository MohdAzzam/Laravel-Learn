<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function index(){

        $userByName=User::all();
        $users = User::paginate(5);
       
        return view('test',['users'=>$users]);
    }

}
