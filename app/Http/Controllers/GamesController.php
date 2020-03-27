<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\PublisherModel;
use App\Http\Models\DeveloperModel;
use App\Http\Models\PlatformModel;
use App\Http\Models\GameModel;
use App\Services\GameService;


class GamesController extends Controller
{
    private $publisher;
    private $developer;
    private $platform;
    private $game;

    public function __construct(PublisherModel $publisher, DeveloperModel $developer, PlatformModel $platform, GameModel $game) {
        $this->publisher = $publisher;
        $this->developer = $developer;
        $this->platform = $platform;
        $this->game = $game;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = $this->game->get_all();

        return view('games', [
            'games' => $games
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = $this->publisher->get_all();
        $devs = $this->developer->get_all();
        $platforms = $this->platform->get_all();

        return view('editor.game-create', [
            'publishers' => $publishers,
            'devs' => $devs,
            'platforms' => $platforms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // $this->game->title = $request->input('title');
        // $this->game->year = $request->input('year');
        // $this->game->description = $request->input('desc');
        // $this->game->publisher = $request->input('ddlPublisher');
        // $this->game->developer = $request->input('ddlDevs');
        // $this->game->platforms = $request->input('platforms');

        // dd($this->game);
        $service = new GameService();
        // return [$request->input('title')];
        $id = $service->insert($request);
        return \redirect(\route('games.show', ['id' => $id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = $this->game->get_game_by_id($id);

        return view('single-game', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'IsEditorsChoice' => (int)$request->input('IsEditorsChoice'),
            'DateModified' => date('Y-m-d H:i:s', time())
        ];

        return $this->game->put_editors_choice($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->game->delete($id);
    }

    public function editor()
    {
        $games = $this->game->get_all();

        return view('editor.games', [
            'games' => $games
        ]);
    }
}
