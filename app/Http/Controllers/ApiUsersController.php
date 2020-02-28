<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiUsersController extends Controller
{
    public function insert()
    {
        $x = \DB::table('korisnici')->get();

        if(!\count($x)){
            $users = [];
        
            $faker = \Faker\Factory::create();

            for ($i=0; $i < 10; $i++) { 
                $single = [];
                $single['email'] = $faker->email;
                $single['username'] = $faker->userName;
                $single['password'] = \md5('sifra1');
                array_push($users, $single);
            }

            try {
                $rez = \DB::table('korisnici')->insert($users);
                return ['data' => $rez];
            } catch (\Throwable $th) {
                return $th->getMessage();
            }

        }

        return 'vec puno';
    }
}
