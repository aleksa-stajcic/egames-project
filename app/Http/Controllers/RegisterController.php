<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Models\UserModel;


class RegisterController extends Controller
{
    private $model;

    public function __construct(UserModel $model) {
        $this->model = $model;
    }

    public function index()
    {
        return view('register');
    }

    public function store(AddUserRequest $request)
    {
        dd($request->all());

        $this->model->username = $request->input('username');
        $this->model->password = $request->input('password');
        $this->model->email = $request->input('email');

        try {
            $rez = $this->model->insert_user($this->model);
        } catch (\PDOException $ex) {
            return response(["greska" => $ex->getMessage()], 505);
        }

        return response(['success' => 'unos uspesan'], 201);

        // dd($_POST['send']);
        // return $request->all();
        // return view('home');
    }
}
