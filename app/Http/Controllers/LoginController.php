<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserModel;


class LoginController extends Controller
{
    private $model;

    public function __construct(UserModel $model) {
        $this->model = $model;
    }

    public function form()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // \dd($request->all());
        /**
         * Needs work still
         * WIP
         */
        $username = $request->input('email');
        $password = md5($request->input('password'));
        return \response([$this->model->get_user_by_username_and_password($username, $password)], 201) ;
        // dd($this->model);

    }

    
}
