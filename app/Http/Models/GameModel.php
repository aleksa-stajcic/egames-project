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
        $games = DB::table(GameModel::TABLE)->select('Games.Id', 'Games.Title', 'Games.Year', 'Games.Description', 'Games.IsEditorsChoice', 'Games.DateAdded', 'Games.DateModified',
                                                    'GamesCover.Path', 'GamesCover.Alt', 'Developers.Name as Developer', 'Publishers.Name as Publisher')
                                            ->join('GamesCover', 'Games.Id', '=', 'GamesCover.GameId')
                                            ->join('Developers', 'Games.DeveloperId', '=', 'Developers.Id')
                                            ->join('Publishers', 'Games.PublisherId', '=', 'Publishers.Id')
                                            ->where('Games.IsDeleted', '<>', '1')
                                            ->paginate(10);
                                            // ->get();
        foreach ($games as $g) {
            $avg = DB::table('Reviews')->select(DB::raw('round(avg(Grade), 1) as Avg'))->where('GameId', '=', $g->Id)->first();
            $g->Grade = $avg->Avg;
        }

        return $games;
    }

    public function get_game_by_id($id)
    {
        $game = DB::table(GameModel::TABLE)->select('Games.*', 'GamesBanner.Path as BannerPath', 
                                                    'GamesBanner.Alt as BannerAlt', 'GamesCover.Path as CoverPath',
                                                     'GamesCover.Alt as CoverAlt')
                                            ->join('GamesBanner', 'Games.Id', '=', 'GamesBanner.GameId')
                                            ->join('GamesCover', 'Games.Id', '=', 'GamesCover.GameId')
                                            // ->join('Reviews', 'Games.Id', '=', 'Reviews.GameId')
                                            ->where('Games.Id', '=', $id)
                                            ->where('Games.IsDeleted', '<>', 1)
                                            // ->groupBy('Games.Title')
                                            ->first();

        $grade = DB::table('Reviews')->select(DB::raw('round(avg(Grade), 1) as Avg'))
                                        ->where('GameId', '=', $id)
                                        ->first();

        $game->Grade = $grade->Avg;

        return $game;
    }

    public function get_games_by_platform($id)
    {
        $games = DB::table(GameModel::TABLE)->select('Games.Id', 'Games.Title', 'Games.Year', 'Games.Description', 'Games.DateAdded', 'Platforms.Name as Platform',
                                                    'GamesCover.Path', 'GamesCover.Alt', 'Developers.Name as Developer', 'Publishers.Name as Publisher')
                                                    ->join('GamesCover', 'Games.Id', '=', 'GamesCover.GameId')
                                                    ->join('Developers', 'Games.DeveloperId', '=', 'Developers.Id')
                                                    ->join('Publishers', 'Games.PublisherId', '=', 'Publishers.Id')
                                                    ->join('GamesPlatforms', 'Games.Id', '=', 'GamesPlatforms.GameId')
                                                    ->join('Platforms', 'Platforms.Id', '=', 'GamesPlatforms.PlatformId')
                                                    ->where('Platforms.Id', '=', $id)
                                                    ->paginate(10);
        
        foreach ($games as $g) {
            $avg = DB::table('Reviews')->select(DB::raw('round(avg(Grade), 1) as Avg'))->where('GameId', '=', $g->Id)->first();
            $g->Grade = $avg->Avg;
        }

        return $games;
        // dd($games);
    }

    public function get_latest()
    {
        $games = DB::table(GameModel::TABLE)->select('Games.Id', 'Games.Title', 'Games.Year', 'GamesCover.Path as Cover', 'GamesCover.Alt as Alt')
                                            ->join('GamesCover', 'Games.Id', '=', 'GamesCover.GameId')
                                            ->where('Games.IsDeleted', '<>', 1)
                                            ->orderBy('Games.Year', 'desc')
                                            ->limit(7)
                                            ->get();

        foreach ($games as $g) {
            $avg = DB::table('Reviews')->select(DB::raw('round(avg(Grade), 1) as Avg'))->where('GameId', '=', $g->Id)->first();
            $g->Grade = $avg->Avg;
        }

        return $games;
    }

    public function get_editors_choice()
    {
        $games = DB::table(GameModel::TABLE)->select('Games.Id', 'Games.Title', 'Games.Year', 'GamesCover.Path as Cover', 'GamesCover.Alt as Alt')
                                            ->join('GamesCover', 'Games.Id', '=', 'GamesCover.GameId')
                                            ->where('Games.IsEditorsChoice', '=', 1)
                                            ->where('Games.IsDeleted', '<>', 1)
                                            // ->orderBy('Games.Year', 'desc')
                                            ->limit(10)
                                            ->get();

        foreach ($games as $g) {
            $avg = DB::table('Reviews')->select(DB::raw('round(avg(Grade), 1) as Avg'))->where('GameId', '=', $g->Id)->first();
            $g->Grade = $avg->Avg;
        }

        return $games;
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

    public function delete($id)
    {
        return DB::table(GameModel::TABLE)->where('Id', '=', $id)->update(['IsDeleted' => 1, 'IsEditorsChoice' => 0]);
    }

    public function put_editors_choice($c, $id)
    {
        
        return DB::table(GameModel::TABLE)->where('Id', '=', $id)->update($c);
    }

}