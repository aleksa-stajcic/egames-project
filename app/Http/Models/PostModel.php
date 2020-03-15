<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class PostModel {

    private const TABLE = 'Posts';

    public $text;
    public $author;
    public $title;

    public function insert(PostsModel $obj)
    {
        dd($obj);
    }

}