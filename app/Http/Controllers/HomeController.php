<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){

        $x = DB::table('tb_3')->get();

        return view('home', [
            'podaci' => $x
        ]);
    }
}
