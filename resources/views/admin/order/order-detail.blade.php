@extends('admin.layouts.backend')
@section('backend')
<div class="box">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-12">
                <div class=" col-md-6">
                    <h4></h4>
                    <table class="table table-bordered table-hover toggle-circle">
                        <thead>
                            <tr>
                                <th class="col-md-5">Mã đơn hàng: HD{{$model->id}}</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Thông tin người đặt hàng</td>
                                <td>{{$model->customer->name}}</td>
                            </tr>

                            <tr>
                                <td>Số điện thoại</td>
                                <td>{{$model->customer->phone}}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ nhận hàng</td>
                                <td>{{$model->customer->address}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$model->customer->email}}</td>
                            </tr>
                            <tr>
                                <td>Ghi chú</td>
                                <td>{{$model->customer->note}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <table id="myTable" class="table table-bordered table-hover dataTable" role="grid"
                aria-describedby="example2_info">
                <thead>
                    <tr role="row">
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                    </thead>
                    <tbody>

                        @foreach($model->orderdetail as $item)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->pro->name}}</td>
                            <td><img src="{{$item->pro->image}}" alt="" width="150px" height="150px"></td>
                            <td>{{$item->quantity}}</td>
                            <td>{{number_format($item->price)}} VNĐ</td>

                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">

        </div>
    </div>
</div>
@endsection