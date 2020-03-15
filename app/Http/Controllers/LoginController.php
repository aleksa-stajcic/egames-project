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

    public function index()
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
        $username = $request->input('username');
        $password = md5($request->input('password'));

        $user = $this->model->get_user_by_username_and_password($username, $password);

        if($user != null){
            $request->session()->put('user', $user);
            return \redirect(\route('home'));
        }else{
            return \redirect(\route('login.index'))->with('msg', 'Doesnt exist');
        }
    }

    public function logout()
    {
        if(\session()->has('user')){
            session()->forget('user');
        }
        return \redirect(route('home'));
    }
}
