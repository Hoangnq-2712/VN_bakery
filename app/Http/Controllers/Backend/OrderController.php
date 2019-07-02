<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Model\Order;
use App\Model\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Customer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list= Order::orderBy("id",'DESC')->paginate(20);
        

        return view('admin.order.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $order = Order::find($id);
        return view('admin.order.order-detail',compact ("order"));
    }

    /**
     cập nhật đơn hàng
     */
     public function update(Request $request, $id)
     {
        $order = Order::find($id);
        $order->status = $request->status;

        $order->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if($id != null){

       $order_detail=Order::find($id);
       $order_detail->orderdetail()->delete();

       Order::destroy($id);
       return redirect()->route('don-hang')->with(['level'=>'success','message'=>'Xóa đơn hàng thành công!']);
   }else{
        echo"Chưa có đơn hàng nào được chọn để xóa!";
    }

    }

    public function ajax(Request $request)
    {
        $action=$request->action;
        $id=$request->id;

        if($action=="update")
        {
            $order=Order::find($id);
            $order->status=1;
            $order->save();

            return json_encode(true);
        }
        return json_encode(false);

    }
}
