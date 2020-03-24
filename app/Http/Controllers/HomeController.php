<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserModel;
use App\Http\Models\PlatformModel;

class HomeController extends Controller
{
    private $user;
    private $platform;

    public function __construct(UserModel $user, PlatformModel $platform) {
        $this->user = $user;
        $this->platform = $platform;
    }


    function index(){

        return view('home', [
            'platforms' => $this->platform->get_all()
        ]);

        
    }

    public function show($username)
    {
        $user = $this->user->get_user_by_username($username);

        return view('profile',[
            'user' => $user
        ]);
    }

    public function store()
    {
        // $this->model->username = "Pera";
        // $this->model->email = "pera@email.com";
        // $this->model->password = "sifra1";
        // $this->model->profile_image = "avatar.jpg";

        // return $this->model->insert_user($this->model);
    }

    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
