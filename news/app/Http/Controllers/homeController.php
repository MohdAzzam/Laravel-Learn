<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");        
    }
    public function index(){
        echo "index";
    }
    public function superAdmin(){
        echo "superadmin";
    }
}
