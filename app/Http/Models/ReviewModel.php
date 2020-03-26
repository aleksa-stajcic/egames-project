<?php

namespace App\Http\Models;
use Illuminate\Support\Facades\DB;

class ReviewModel {
    private const TABLE = 'Reviews';

    public $text;
    public $grade;
    public $game;
    public $user_id;

    public function get_reviews_by_game($game_id)
    {
        return DB::table(ReviewModel::TABLE)
            ->select('Reviews.*', 'Users.Username', 'Users.ProfileImage')
            ->join('Users', 'Reviews.ReviewerId', '=', 'Users.Id')
            ->where('GameId', '=', $game_id)
            ->get();
    }

    public function insert(ReviewModel $obj)
    {
        $review = [
            'Text' => $obj->text,
            'Grade' => $obj->grade,
            'GameId' => $obj->game,
            'ReviewerId' => $obj->user_id,
        ];

        return DB::table(ReviewModel::TABLE)->insert($review);
    }

}
