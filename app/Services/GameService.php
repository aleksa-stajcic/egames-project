<?php


namespace App\Services;

use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Models\GameModel;
use Illuminate\Support\Facades\DB;

class GameService {
    private $model;


    public function __construct() {
        $this->model = new GameModel();
    }

    public function insert($request)
    {
        // return [$request->input('ddlDevs')];

        $cover = $this->upload($request, 'cover');
        $banner = $this->upload($request, 'banner');

        $this->model->title = $request->input('title');
        $this->model->year = $request->input('year');
        $this->model->description = $request->input('desc');
        $this->model->publisher = $request->input('ddlPublisher');
        $this->model->developer = $request->input('ddlDevs');
        $this->model->platforms = $request->input('platforms');
        $this->model->cover = $cover;
        $this->model->banner = $banner;

        DB::beginTransaction();
        // return [$this->model];

        try {
            $id = $this->model->insert($this->model);
            DB::commit();

        } catch (\PDOException $ex) {
            \Log::error($ex->getMessage());
            DB::rollback();
            return null;
        }
        
        return $id;
    }

    private function upload($request, $input_name)
    {
        $image = $request->file($input_name);

        $naziv = UploadService::upload($image, 'games');

        return $naziv;
    }
}