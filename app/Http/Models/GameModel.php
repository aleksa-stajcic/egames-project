<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;


class GameModel {

    private const TABLE = 'Games';

    public $title;
    public $developer;
    public $publisher;
    public $platforms;
    public $description;
    public $year;
    public $cover;
    public $banner;
    

    public function get_all()
    {
        return DB::table(GameModel::TABLE)->join('GamesCover', 'Games.Id', '=', 'GamesCover.GameId')
                                            ->paginate(10);
    }

    public function get_game_by_id($id)
    {
        return DB::table(GameModel::TABLE)->select('Games.*', 'GamesBanner.Path as BannerPath', 'GamesBanner.Alt as BannerAlt', 'GamesCover.Path as CoverPath', 'GamesCover.Alt as CoverAlt')
                                            ->join('GamesBanner', 'Games.Id', '=', 'GamesBanner.GameId')
                                            ->join('GamesCover', 'Games.Id', '=', 'GamesCover.GameId')
                                            ->where('Games.Id', '=', $id)
                                            ->first();
    }

    public function get_latest()
    {
        return DB::table(GameModel::TABLE)->select('Games.Id', 'Games.Title', 'Games.Year', 'GamesCover.Path as Cover', 'GamesCover.Alt as Alt')
                                            ->join('GamesCover', 'Games.Id', '=', 'GamesCover.GameId')
                                            ->orderBy('Games.Year', 'desc')
                                            ->limit(7)
                                            ->get();
    }

    public function insert(GameModel $obj)
    {
        // $this->title = $obj->title;
        // $this->developer = $obj->developer;
        // $this->publisher = $obj->publisher;
        // $this->platforms = $obj->platforms;
        // $this->year = $obj->year;

        // dd($obj);

        $data = [
            'Title' => $obj->title,
            'DeveloperId' => $obj->developer,
            'PublisherId' => $obj->publisher,
            'Description' => $obj->description,
            'Year' => $obj->year
        ];

        $id = DB::table(GameModel::TABLE)->insertGetId($data);

        // $id = 1;

        $gp = [];

        foreach ($obj->platforms as $p) {
            $gp[] = [
                'GameId' => $id,
                'PlatformId' => $p
            ];
        }

        // dd($gp);

        DB::table('GamesPlatforms')->insert($gp);

        DB::table('GamesCover')->insert(['GameId' => $id, 'Path' => $obj->cover, 'Alt' => $obj->title]);
        DB::table('GamesBanner')->insert(['GameId' => $id, 'Path' => $obj->banner, 'Alt' => $obj->title]);

        return $id;
    }

}