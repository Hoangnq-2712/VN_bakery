<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table ='order';

	protected $fillable = [

		'customer_id','amount','total','status','payment'
	];

	public function product()
	{
		return $this->hasMany('\App\Model\Product');
	}

	public function customer()
	{
		return $this->belongsTo('App\Model\Customer', 'customer_id');
	}

	public function orderdetail()
	{
		return $this->hasMany('App\Model\OrderDetail', 'order_id', 'id');
	}

}
