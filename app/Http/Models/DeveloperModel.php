<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;


class DeveloperModel {
    private const TABLE = 'Developers';

    public function get_all()
    {
        return DB::table(DeveloperModel::TABLE)->get();
    }

}