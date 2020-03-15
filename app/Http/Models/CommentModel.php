<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class CommentModel {

    private const TABLE = 'Comments';

    public function get_comments_by_post($post_id, $parent_id = null)
    {
        return DB::table(CommentModel::TABLE)
            ->select('Comments.*', 'Users.Username')
            ->join('Users', 'Comments.CommenterId', '=', 'Users.Id')
            ->where([
                ['PostId', '=', $post_id],
                ['ParentComment', '=', $parent_id]
            ])->get();
    }
}