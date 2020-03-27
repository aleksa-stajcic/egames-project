<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserModel;
use App\Http\Models\PlatformModel;
use App\Http\Models\GameModel;
use App\Http\Models\PostModel;

class HomeController extends Controller
{
    private $user;
    private $platform;
    private $game;
    private $post;

    public function __construct(UserModel $user, PlatformModel $platform, GameModel $game, PostModel $post) {
        $this->user = $user;
        $this->platform = $platform;
        $this->game = $game;
        $this->post = $post;
    }


    function index(){

        return view('home', [
            'platforms' => $this->platform->get_all(),
            'latest' => $this->game->get_latest(),
            'choice' => $this->game->get_editors_choice(),
            'articles' => $this->post->get_latest()
        ]);

        
    }

    public function show($username)
    {
        $user = $this->user->get_user_by_username($username);
        
        if($user){
            return view('profile',[
                'user' => $user
            ]);
        }
        return \redirect(route('fallback', ['fallbackPlaceholder' => 'not-found' ]));
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
