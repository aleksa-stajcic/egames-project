<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\GameModel;

class ApiGamesController extends Controller
{
    private $model;

    public function __construct(GameModel $model) {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->get_all();
    }
}
