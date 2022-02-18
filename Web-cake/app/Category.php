<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
   	use SoftDeletes;
    protected $fillable = [
        'name'
    ];
    protected $date = ['deleted_at'];

    public function products(){
        return $this->hasMany('App\Product','category_id','id');
    }
}



