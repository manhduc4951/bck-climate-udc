<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public static function generateDropdownList() {
        $roles = self::all();
        $result = array();
        if($roles) {
            foreach ($roles as $role) {
                $result[$role->id] = ucfirst($role->name);
            }
        }

        return $result;
    }
}
