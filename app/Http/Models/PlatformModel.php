<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;


class PlatformModel {

    private const TABLE = 'Platforms';

    public function get_all()
    {
        return DB::table(PlatformModel::TABLE)->get();
    }
}