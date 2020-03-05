<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserModel;

class ApiUsersController extends Controller
{
    private $model;

    public function __construct(UserModel $model) {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->get_all();
    }

    public function insert()
    {
        $x = \DB::table('korisnici')->get();

        if(\count($x) == 0){
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
                return \response('data inserted.', 201);
            } catch (\Throwable $th) {
                return \response('error', 500);
            }

        }

        return \response("Already full.", 204);
    }


    public function destroy($id)
    {
        return ['data' => 'deleted ' . $id];
    }
}
