<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserModel;

class HomeController extends Controller
{
    private $model;

    public function __construct(UserModel $model) {
        $this->model = $model;
    }


    function index(){

        // return view('home', [
        //     'podaci' => $x,
        //     'korisnici' => $this->model->get_all()
        // ]);

        return [
            // 'podaci' => $x,
            'model' => $this->model->get_all()
        ];
    }

    public function show($id)
    {
        return [
            $this->model->get_one($id)
        ];
    }

    // public function store()
    // {
    //     return $this->model->charge(2500);
    // }
}
