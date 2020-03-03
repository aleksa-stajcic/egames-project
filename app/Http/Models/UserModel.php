<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class UserModel {

    private const TABLE = 'Users';

    public $username;
    public $password;
    public $email;
    public $role_id;
    public $profile_image;

    public function get_all()
    {
        return DB::table(UserModel::TABLE)->select('Users.*', 'Roles.Name as RoleName')->join('Roles', 'Users.RoleId', '=', 'Roles.Id')->get();
    }

    public function get_user_by_id($id)
    {
        /* Check if user is deleted (IsActive == 0) */
        return DB::table(UserModel::TABLE)->find($id);
    }

    public function get_user_by_username($username)
    {
        # Profile page; if user is inactive (IsActive == 0) return 404 Not Found

        /* Not needed, use props for insert only */
        $this->username = $username;

        return DB::table(UserModel::TABLE)->where(['Username', $this->username])->first();
    }

    public function get_user_by_username_and_password($username, $password)
    {
        # For logging in
        ## Check if user is active (IsActive == 1), if not notify the account is banned
        $this->username = $username;
        $this->password = $password;

        // return DB::table(UserModel::TABLE)->where(['Username', $this->username], ['Password', $this->password])->first();

        return (['email' => $this->username, 'password' => $this->password]);
    }

    public function delete($id)
    {
        // return DB::table($this->table)->where('Id', $id)->delete();
        # Instead of deleting the user, just making the user inactive (setting IsActive to 0)

        $today = date('Y-m-d H:i:s', time());
        return $today;
        // return DB::table(UserModel::TABLE)->where('Id', $id)->update(['IsActive' => 0, 'DateModified' => $today]);
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
        $this->role_id = 1;
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

    public function update_user(UserModel $obj)
    {
        # code...
    }
}
