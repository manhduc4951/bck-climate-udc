<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Sortable;

    public $sortable = ['id','name','email','role_id','is_active','created_at','updated_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $admin_const = "admin";

    protected $active_const = 1;

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function isAdmin() {
        if($this->isActive() && $this->role->role == $this->admin_const) {
            return true;
        }
        return false;
    }

    public function isActive() {
        if($this->is_active == $this->active_const) {
            return true;
        }
        return false;
    }

    public function showActiveIcon() {
        if($this->isActive()) {
            echo '<i class="fa fa-check" aria-hidden="true"></i>' . " (Yes)";
        } else {
            echo '<i class="fa fa-ban" aria-hidden="true"></i>' . ' (No)';
        }
    }
}
