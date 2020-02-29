<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class UserModel {
    public function get_all()
    {
        $x = DB::table('korisnici')->get();

        return $x;
    }
}
