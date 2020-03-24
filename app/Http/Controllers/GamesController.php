<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\PublisherModel;
use App\Http\Models\DeveloperModel;
use App\Http\Models\PlatformModel;

class GamesController extends Controller
{
    private $publisher;
    private $developer;
    private $platform;

    public function __construct(PublisherModel $publisher, DeveloperModel $developer, PlatformModel $platform) {
        $this->publisher = $publisher;
        $this->developer = $developer;
        $this->platform = $platform;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return [
            'publishers' => $publishers,
            'devs' => $devs,
            'platforms' => $platforms
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
