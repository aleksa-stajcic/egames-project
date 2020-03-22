<?php


namespace App\Services;

use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Models\UserModel;
use Illuminate\Support\Facades\DB;

class UserService {

    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function insert($request)
    {
        $slika = $this->upload($request);

        $this->model->username = $request->input('username');
        $this->model->password = $request->input('password');
        $this->model->email = $request->input('email');
        $this->model->profile_image = $slika;

        // dd($this->model);

        DB::beginTransaction();

        try {
            $rez = $this->model->insert_user($this->model);
            DB::commit();
        } catch (\PDOException $ex) {
            \Log::error($ex->getMessage());
            DB::rollback();
            return response(["greska" => $ex->getMessage()], 505);
        }

        return response(['success' => 'unos uspesan'], 201);
    }

    private function upload($request)
    {
        $image = $request->file('image');

        $naziv = UploadService::upload($image, 'users');

        return $naziv;
    }
}
