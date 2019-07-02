<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $table ='customer';

      protected $fillable = [

      	'name','phone','address','email','note'
      ];
      public function order()
    {
        return $this->hasMany('App\Model\Order', 'customer_id', 'id');
    }
}

