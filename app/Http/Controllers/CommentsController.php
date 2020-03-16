<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\CommentModel;

class CommentsController extends Controller
{
    public function __construct(CommentModel $model) {
        $this->model = $model;
    }

    public function get_comments($post_id)
    {
        $x = $this->display($post_id);

        // dd($x);
        return $x;
    }


    /**
     * Call route in JS/AJAX
     * Call to db only once, reformat the data given
     */

    public function display($post_id, $parent_id = null)
    {
        $comments = $this->model->get_comments_by_post($post_id, $parent_id);
        $y = [];
        foreach ($comments as $c) {
            array_push($y, $c);
            $child = $this->display($post_id, $c->Id);
            if(\count($child)){
                // array_push($y, $child);
                $c->Children = $child;
            }
        }

        return $y;
    }
}
