<?php

namespace App\Http\Controllers\Backend;


use App\Model\Customer;
use App\Model\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use DB;

class OrderDetailsController extends Controller
{
	public function index($id)
	{
			$model=Order::find($id);
			return view('admin.order.order-detail', compact('model'));

	
	}
	

}
