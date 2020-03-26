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
        $faker = \Faker\Factory::create();

        $games = $this->game->get_all();
        $users = $this->user->get_all();

        $user_id = $this->fill_id($users);
        $game_id = $this->fill_id($games);

        $review_data = [];

        for ($i=0; $i < 300; $i++) { 
            $review_data[$i]['Grade'] = $faker->randomDigit + 1;
            $review_data[$i]['GameId'] = $faker->randomElement($game_id);
            $review_data[$i]['ReviewerId'] = $faker->randomElement($user_id);
            $review_data[$i]['Text'] = $faker->text(100);
        }

        $res = \DB::table('Reviews')->insert($review_data);

        return [$res];

    }

    public function posts()
    {
        $faker = \Faker\Factory::create();

        $users = $this->user->get_all();

        $user_id = $this->fill_id($users);

        $post_data = [];

        for ($i=0; $i < 100; $i++) { 
            $post_data[$i]['Text'] = $faker->text(1000);
            $post_data[$i]['Title'] = $faker->text(100);
            $post_data[$i]['AuthorId'] = $faker->randomElement($user_id);
        }

        $res = \DB::table('Posts')->insert($post_data);

        return [$res];
    }

    private function fill_id($data)
    {
        $empty = [];

        foreach ($data as $d) {
            array_push($empty, $d->Id);
        }

        return $empty;
    }
}
