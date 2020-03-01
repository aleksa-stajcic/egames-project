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

        return view('home', [
            'korisnici' => $this->model->get_all()
        ]);

        
    }

    public function show($id)
    {
        return [
            $this->model->get_one($id)
        ];
    }

    public function store()
    {
        $this->model->username = "Pera";
        $this->model->email = "pera@email.com";
        $this->model->password = "sifra1";
        $this->model->profile_image = "avatar.jpg";

        return $this->model->insert_user($this->model);
    }

    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
