<?php 
namespace App\Helper;

/**
 * 
 */
class Cart
{
	public $items = [];

	public function __construct()
	{
		$this->items = session('cart');

	}
	public function add($model)
	{
		$this->items[$model->id] = [
			'id'=>$model->id,
			'name'=>$model->name,
			'price'=>$model->sale_price > 0 ? $model->sale_price: $model->price,
			'quantity'=>1,
			'image'=>$model->image
		];
		// dd($this->items);
		session(['cart'=>$this->items]);
	}
	
};


?>