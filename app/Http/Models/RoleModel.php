<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class RoleModel {

    private const TABLE = 'Roles';

    public function get_all()
    {
        return DB::table(RoleModel::TABLE)->get();
    }
}