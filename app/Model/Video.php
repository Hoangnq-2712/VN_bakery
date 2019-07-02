<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
      protected $table ='video';

       protected $fillable = [

      	'category_id','name','link','status'
      ];



       public function scopeSearch($query){

        if(empty(request()->search)){
            return $query;
        }else{
            return $query->where('name','like','%'.request()->search.'%');
        }
    }
}
