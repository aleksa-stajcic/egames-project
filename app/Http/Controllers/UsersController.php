<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserModel;
use App\Http\Models\RoleModel;

class UsersController extends Controller
{
    private $user;
    private $role;

    public function __construct(UserModel $user, RoleModel $role) {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->get_all();

        return \view('admin.users', [
            'users' => $users
        ]);

        // dd($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = $this->user->get_user_by_id($id);
        $roles = $this->role->get_all();
        // dd($user);

        return view('admin.edit', [
            'user' => $user,
            'roles' => $roles
        ]);

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

        // return $request->input();
        $data = [
            'roleId' => $request->has('roleId') ? $request->input('roleId') : null,
            'status' => $request->has('status') ? $request->input('status') : null
        ];

        // return $data;

        $r = $this->user->update_user($id, $data);
        return $r;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rez = $this->user->delete($id);
        return $rez;
        // return \response(['data' => 'obrisan'], 204);
        // return ['obrisan'];
    }
}
