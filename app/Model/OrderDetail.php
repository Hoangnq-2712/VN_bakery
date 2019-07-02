<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table ='orderdetail';


	protected $fillable = [

		'order_id','product_id','quantity','price'
	];

	public function pro()
	{
		return $this->hasOne('App\Model\Product','id','product_id');
	}
	 public function order()
    {
        return $this->belongsTo('App/Model/Order', 'order_id');
    }
}
