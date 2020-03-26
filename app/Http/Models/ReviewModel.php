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
