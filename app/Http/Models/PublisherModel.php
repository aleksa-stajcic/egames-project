<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;


class PublisherModel {
    private const TABLE = 'Publishers';

    public function get_all()
    {
        return DB::table(PublisherModel::TABLE)->orderBy('Name')->get();
    }

}