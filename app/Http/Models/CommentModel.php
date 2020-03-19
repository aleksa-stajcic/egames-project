<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class CommentModel {

    private const TABLE = 'Comments';

    public $parent_comment;
    public $text;
    public $post;
    public $user_id;

    public function get_comments_by_post($post_id, $parent_id = null)
    {
        return DB::table(CommentModel::TABLE)
            ->select('Comments.*', 'Users.Username', 'Users.ProfileImage')
            ->join('Users', 'Comments.CommenterId', '=', 'Users.Id')
            ->where([
                ['PostId', '=', $post_id],
                ['ParentComment', '=', $parent_id]
            ])->get();
    }

    public function insert(CommentModel $obj)
    {
        $comment = [
            'PostId' => $obj->post,
            'Text' => $obj->text,
            'ParentComment' => $obj->parent_comment,
            'CommenterId' => $obj->user_id
        ];
        /**
         * return true | false
         */
        return DB::table(CommentModel::TABLE)->insert($comment);
    }
}