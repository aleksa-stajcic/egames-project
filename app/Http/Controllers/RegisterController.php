<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(AddUserRequest $request)
    {
        // dd($_POST['send']);
        return $request->all();
    }
}
