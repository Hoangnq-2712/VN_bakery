<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $table ='banner';
	
	protected $fillable =['name','slug','image','status'];


	public function banner()
	{
		return $this->hasMany('App\Model\BannerImage', 'banner_id', 'id');
	}
	public function scopeSearch($query){

		if(empty(request()->search)){
			return $query;
		}else{
			return $query->where('name','like','%'.request()->search.'%');
		}
	}

}
