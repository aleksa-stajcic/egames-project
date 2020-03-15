<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class PostModel {

    private const TABLE = 'Posts';

    public $text;
    public $author_id;
    public $title;


    public function get_all()
    {
        return DB::table(PostModel::TABLE)->select('Posts.Text', 'Posts.Title', 'Posts.Text', 'Posts.AuthorId', 'Posts.DateAdded', 'Users.Username')->join('Users', 'Users.Id' , '=', 'Posts.AuthorId')->get();
    }

    public function insert(PostModel $obj)
    {
        // dd($obj);

        $this->text = $obj->text;
        $this->author_id = $obj->author_id;
        $this->title = $obj->title;

        $data = [
            'Text' => $this->text,
            'Title' => $this->title,
            'AuthorId' => $this->author_id
        ];

        return DB::table(PostModel::TABLE)->insert($data);
    }

}