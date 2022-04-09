<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetail extends Model
{
	//use SoftDeletes;
    protected $fillable = [
        'bill_id', 'product_id', 'quantity', 'unit_price',
    ];
    //protected $date = ['deleted_at'];

    public function bill(){
        return $this->belongsTo('App\Bill','bill_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
