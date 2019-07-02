<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table ='product';

	protected $fillable = [

		'name','slug','category_id','price','sale_price','description','status'
	];


	public function category()
	{
		return $this->belongTo('App\Model\Category');
	}

	
	public function images(){
		return $this->hasMany('\App\Model\ProductImage','product_id','id');
	}

	public function scopeSearch($query){

		if(empty(request()->search)){
			return $query;
		}else{
			return $query->where('name','like','%'.request()->search.'%');
		}
	}

} ;
