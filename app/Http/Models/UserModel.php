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
        return DB::table(UserModel::TABLE)->where('Users.Id', $id)->find($id);
    }

    public function get_user_by_username($username)
    {
        # Profile page; if user is inactive (IsActive == 0) return 404 Not Found

        /* Not needed, use props for insert only */
        
        $this->username = $username;

        $user = DB::table(UserModel::TABLE)->select('Users.*', 'Roles.Name as RoleName')
                                            ->join('Roles', 'Users.RoleId', '=', 'Roles.Id')
                                            ->where('Users.Username', $this->username)
                                            ->first();

        $posts = DB::table('Posts')->where('AuthorId', '=', $user->Id)->orderBy('DateAdded', 'desc')->paginate(3);

        $user->Posts = $posts;

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
                                                ['Password', $this->password]
                                            ])->first();
    }

    public function delete($id)
    {
        return DB::table(UserModel::TABLE)->where('Id', $id)->update(['IsDeleted' => 1, 'DateModified' => date('Y-m-d H:i:s', time())]);
        # Instead of deleting the user, just making the user inactive (setting IsActive to 0)
        # Cant delete self
        # !!! Foreign key constraint with Comments, Posts, Reviews
        
        // $exists = DB::table(UserModel::TABLE)->where('Id', $id)->exists();

        // if($exists){
        //     $user = DB::table(UserModel::TABLE)->find($id);

        //     $today = date('Y-m-d H:i:s', time());

        //     $username = $user->Username;
        //     $email = $user->Email;

        //     $data = [
        //         'Username' => $username,
        //         'Email' => $email
        //     ];

        //     try {

        //         $result = DB::table(UserModel::DELETED)->insert($data);
                
        //         if($result){
        //             try {
        //                 $delete = DB::table(UserModel::TABLE)->where('Id', '=', $user->Id)->delete();
        //                 return ['deleted' => $delete];
        //             } catch (\PDOException $e) {
        //                 return ['message' => $e->getMessage()];
        //             }
        //         }

        //     } catch (\PDOException $e) {
        //         return ['message' => $e->getMessage()];
        //     }
        // }

        // return $today;
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
