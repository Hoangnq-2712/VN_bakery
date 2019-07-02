<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table ='post';

	protected $fillable = [

		'title','slug','content','status','creator'
	];
	

 	public function scopeSearch($query){

		if(empty(request()->search)){
			return $query;
		}else{
			return $query->where('title','like','%'.request()->search.'%');
		}
	}

}
