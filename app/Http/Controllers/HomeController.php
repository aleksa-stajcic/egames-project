<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\TestModel;

class HomeController extends Controller
{
    private $model;

    public function __construct(TestModel $model) {
        $this->model = $model;
    }


    function index(){

        $x = DB::table('tb_3')->get();

        return view('home', [
            'podaci' => $x,
            'model' => $this->model->name
        ]);

        // return [
        //     'podaci' => $x,
        //     'model' => $this->model->name
        // ];
    }

    public function store()
    {
        return $this->model->charge(2500);
    }
}
