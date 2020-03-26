<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserModel;
use App\Http\Models\GameModel;
use App\Http\Models\ReviewModel;


class ApiFillController extends Controller
{
    private $user;
    private $game;
    private $review;

    public function __construct(UserModel $user, GameModel $game, ReviewModel $review) {
        $this->user = $user;
        $this->game = $game;
        $this->review = $review;
    }

    public function reviews()
    {
        $games = $this->game->get_all();
        $users = $this->user->get_all();

        $user_id = [];
        $game_id = [];

        foreach ($users as $u) {
            array_push($user_id, $u->Id);
        }

        foreach ($games as $g) {
            array_push($game_id, $g->Id);
        }

        // return $game_id;

    }
}
