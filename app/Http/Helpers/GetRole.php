<?php
namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;

class GetRole{
    private $id;
    public function getRoleUsers($id){
        $model_role =  DB::table('model_has_roles')->where('model_id', $id)->get();
        foreach ($model_role as $result) {
            $role_id  = $result->role_id;
        }
       $roles =  DB::table('roles')->where('id', $role_id)->get();
       foreach ($roles as $role) {
         $role_name = $role->name;
       }
       return $role_name;
    }
    public function getRoleid($id){
        $model_role =  DB::table('model_has_roles')->where('model_id', $id)->get();
        foreach ($model_role as $result) {
            $role_id  = $result->role_id;
        }
       return $role_id;
    }
}
