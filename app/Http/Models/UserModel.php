<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class UserModel {

    private $table = 'Users';

    public $username;
    public $password;
    public $email;
    public $profile_image;

    public function get_all()
    {
        return DB::table($this->table)->get();
    }

    public function get_user_by_id($id)
    {
        /* Check if user is deleted (IsActive == 0) */
        return DB::table($this->table)->find($id);
    }

    public function get_user_by_username($username)
    {
        # Profile page; if user is inactive (IsActive == 0) return 404 Not Found

        /* Not needed, use props for insert only */
        $this->username = $username;

        return DB::table($this->table)->where(['Username', $this->username])->first();
    }

    public function get_user_by_username_and_password($username, $password)
    {
        # For logging in; check if user is active (IsActive == 1), if not notify the account is banned
        $this->username = $username;
        $this->password = md5($password);

        return DB::table($this->table)
                            ->where(
                                ['Username', $this->username], 
                                ['Password', $this->password]
                            )
                            ->first();
    }

    public function delete($id)
    {
        // return DB::table($this->table)->where('Id', $id)->delete();
        # Instead of deleting the user, just making the user inactive (setting IsActive to 0)
        return DB::table($this->table)->where('Id', $id)->update(['IsActive' => 0]);
    }

    public function insert_user(UserModel $user)
    {
        /* Server side validation of $user data */
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = md5($user->password);
        $this->profile_image = $user->profile_image;

        DB::table('users')->insert(
            [
                'Username' => $this->username,
                'Password' => $this->password,
                'Email' => $this->email,
                'ProfileImage' => $this->profile_image
            ]
        );
    }
}
