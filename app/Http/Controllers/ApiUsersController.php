<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiUsersController extends Controller
{
    public function insert()
    {
        $users = [];
        
        // $user = new stdClass();
        $faker = 

        $user['firstname'] = $faker->firstName;
        $user['lastname'] = $faker->lastName;

        return $user;
    }
}
