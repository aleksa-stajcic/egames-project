<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\PostModel;

class PostsController extends Controller
{
    private $model;

    public function __construct(PostModel $model) {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->model->get_all();

        return view('posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->session()->all());
        // dd($request->all());
        // dd($request->input('post-text'));
        $this->model->title = $request->input('title');
        $this->model->text = $request->input('post-text');
        $this->model->author_id = $request->session()->get('user')->Id;

        // dd($this->model);

        

        try {
            $rez = $this->model->insert($this->model);
        } catch (\PDOException $ex) {
            return response(["greska" => $ex->getMessage()], 505);
        }

        // return response(['success' => 'unos uspesan'], 201);
        return \redirect(\route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->model->get_post_by_id($id);
        
        return view('single-post',[
            'post' => $post
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
