<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'user_id', 'name', 'phone', 'address', 'date_order', 'total', 'payment', 'note', 'status',
    ];
    protected $date = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function bill_details(){
        return $this->hasMany('App\BillDetail','bill_id','id');
    }
}
