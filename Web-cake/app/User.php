<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'phone', 'address', 'is_admin', 'status'
    ];
    protected $date = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];


    public function bills(){
        return $this->hasMany('bill','user_id','id');
    }

    public function comments() {
        return $this->hasMany('App\Comment','user_id','id');
    }
    public function isAdmin()
    {
        return $this->is_admin;
    }
}
