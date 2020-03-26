<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ReviewModel;

class ReviewsController extends Controller
{
    private $review;

    public function __construct(ReviewModel $review) {
        $this->review = $review;
    }

    public function get_reviews($game_id)
    {
        return $this->review->get_reviews_by_game($game_id);
    }

    public function store(Request $request)
    {
        $this->review->text = $request->input('Text');
        $this->review->game = $request->input('GameId');
        $this->review->grade = $request->input('Grade');
        $this->review->user_id = $request->session()->get('user')->Id;

        $rez = $this->review->insert($this->review);

        return [
            'result' => $rez
        ];
    }
}
