<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class UserModel {

    private const TABLE = 'Users';
    private const DELETED = 'DeletedUsers';

    public $username;
    public $password;
    public $email;
    public $role_id;
    public $profile_image;

    public function get_all()
    {
        
            return DB::table(UserModel::TABLE)
                    ->select('Users.*', 'Roles.Name as RoleName')
                    ->join('Roles', 'Users.RoleId', '=', 'Roles.Id')
                    ->where('IsDeleted', '<>', 1)
                    ->where('Users.Id', '<>', session('user')->Id)
                    ->orderBy('Users.Id')
                    ->paginate(10);
                    // ->get();
    }

    public function search($query)
    {
        return DB::table(UserModel::TABLE)
                    ->select('Users.*', 'Roles.Name as RoleName')
                    ->join('Roles', 'Users.RoleId', '=', 'Roles.Id')
                    // ->where('Email', 'like', '%' . $query . '%')
                    ->where('Users.Username', 'like', '%' . $query . '%')
                    ->orderBy('Users.Id')
                    // ->get();
                    ->paginate(10);
    }

    public function get_user_by_id($id)
    {
        /* Check if user is deleted (IsActive == 0) */
        return DB::table(UserModel::TABLE)->where('Users.Id', $id)->where('Users.IsDeleted', '<>', 1)->find($id);
    }

    public function get_user_by_username($username)
    {
        $this->username = $username;

        $user = DB::table(UserModel::TABLE)->select('Users.*', 'Roles.Name as RoleName')
                                            ->join('Roles', 'Users.RoleId', '=', 'Roles.Id')
                                            ->where('Users.Username', $this->username)
                                            ->where('Users.IsDeleted', '<>', 1)
                                            ->first();

        if(!$user){
            return null;
        }

        $posts = DB::table('Posts')->where('AuthorId', '=', $user->Id)->orderBy('DateAdded', 'desc')->paginate(3);
        
        $user->Posts = $posts;
                                            
        // dd($user);
        ## Probably doesnt work
        return $user;
    }

    public function get_user_by_username_and_password($username, $password)
    {
        # For logging in
        ## Check if user is active (IsActive == 1), if not notify the account is banned
        ## Check if user exists
        $this->username = $username;
        $this->password = $password;

        return DB::table(UserModel::TABLE)->select('Users.Id', 'Users.Username', 'Users.Email', 'Users.ProfileImage', 'Users.IsActive', 'Users.IsDeleted', 'Users.RoleId', 'Roles.Name as RoleName')
                                            ->join('Roles', 'Users.RoleId', '=', 'Roles.Id')
                                            ->where([
                                                ['Username', $this->username], 
                                                ['Password', $this->password],
                                                ['IsDeleted', '<>', 1]
                                            ])->first();
    }

    public function delete($id)
    {
        return DB::table(UserModel::TABLE)->where('Id', $id)->update(['IsDeleted' => 1, 'DateModified' => date('Y-m-d H:i:s', time())]);
        
    }

    public function insert_user(UserModel $obj)
    {
        /* 
            Server side validation of $obj data
            AddUserRequest instead of UserModel
        */
        $this->username = $obj->username;
        $this->email = $obj->email;
        $this->password = md5($obj->password);
        $this->role_id = 4;
        $this->profile_image = $obj->profile_image;

        $data = [
                'Username' => $this->username,
                'Password' => $this->password,
                'Email' => $this->email,
                'RoleId' => $this->role_id
                # 'RoleId' => default role, lowest privilages
        ];

        if($this->profile_image != null){
            $data['ProfileImage'] = $this->profile_image;
        }

        $unos = DB::table(UserModel::TABLE)->insert($data);

        return $unos;
    }

    public function update_user($id, $data)
    {
        $exists = DB::table(UserModel::TABLE)->where('Id', $id)->exists();
        
        if($exists){
            
            $user = DB::table(UserModel::TABLE)->find($id);

            // $roleId = (int)$data['roleId'] ? (int)$data['roleId'] : $user->RoleId;
            // $status = (int)$data['status'] ? 0 : 1;

            $data = [
                'IsActive' => (int)$data['status'] ? 0 : 1,
                'RoleId' => (int)$data['roleId'] ? (int)$data['roleId'] : $user->RoleId,
                'DateModified' => date('Y-m-d H:i:s', time())
            ];

            // $today = date('Y-m-d H:i:s', time());

            try {
                $result = DB::table(UserModel::TABLE)->where('Id', $id)->update($data);
                return \response(['success'], 201);
            } catch (\PDOException $e) {
                return $e->getMessage();
            }

        }else{
            return \response('User doesn\'t exist', 404);
        }
    }
}
