@extends('admin.layouts.backend')
@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách sản phẩm</h3>
    </div>

    @if(count($list)>0)
    <table class="table table-hover">

        <table class="table table-hover">
            <thead>
               @if(Session::has('level'))
               <div class="col-md-6">
                <div class="alert alert-{{Session::get('level')}}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{Session::get('message')}}</strong> Good !
                </div>
            </div>
            @endif
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Ngày đặt hàng</th>
                <th>Email</th>
                <th>Tổng tiền đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $item)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>HD{{$item->id}}</td>
                <td>{{$item->customer->name}}</td>
                <td>{{$item->customer->address}}</td>
                <td>{{$item->created_at->format('d-m-Y')}}</td>
                <td>{{$item->customer->email}}</td>
                <td>{{number_format($item->total)}}.đ</td>

                <td class="text-center">
                    @if($item->status==0)
                    Chưa xử lý
                    @elseif($item->status==3)
                    Đang xử lý
                    @elseif($item->status==1)
                    Đã hoàn thành
                    @endif
                </td>

                <td >
                    @if($item->status==0)
                    <a href="javascript:void(0)" id="done" data-idOrder="{!! $item->id !!}"><i class="fa fa-check"></i></a>
                    @endif
                    @if($item->status==3 )
                    <a href="javascript:void(0)" id="done" data-idOrder="{!! $item->id !!}"><i class="fa fa-check"></i></a>
                    @endif
                    <a data-toggle="tooltip" data-original-title="Close"
                    data-product-id="" class="DeleteProduct"
                    href="{{route('chi-tiet-don-hang',$item->id)}}"> <i
                    class="fa fa-eye"></i> </a>
                    @if($item->status==0)
                    <a href="javascript:void(0)" id="done1" data-idOrder="{!! $item->id !!}"><i class="fa fa-motorcycle"></i></a>
                    @endif
                    <!-- Xóa đơn hàng -->
                    {!! csrf_field() !!}
                    {{method_field('DELETE')}}
                    <a href="{{route('xoa-don-hang',$item->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i></a>


                </td>

            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    {{--{!! $list_product->render() !!}--}}
                </td>
            </tr>
        </tfoot>
    </table>
    @else
    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Hiện tại chưa có đơn hàng nào!!!</strong>
                    </div> 
    @endif
    <script>
        $(document).ready(function () {

            $(document).on('click','#done',function () {
                if(confirm('Đơn hàng đã hoàn thành?')){
                    var id = $(this).attr('data-idOrder');
                    var url = '{!! route('order.ajax')!!}';

                    $.ajax({
                        url:url,
                        type:'POST',
                        dataType:'json',
                        data:{id:id,action:'update'}
                    })
                    .done(function(data){
                        $('#demo-foo-addrow2').load(window.location.href+ " #demo-foo-addrow2");
                        $('#done').fadeOut();
                    })

                }
            });
        });


    </script>

    <script>
        $(document).ready(function () {

            $(document).on('click','#done1',function () {
                if(confirm('Đơn hàng đãng xử lý')){
                    var id = $(this).attr('data-idOrder');
                    var url = '{!! route('order1.ajax')!!}';

                    $.ajax({
                        url:url,
                        type:'POST',
                        dataType:'json',
                        data:{id:id,action:'update'}
                    })
                    .done(function(data){
                        $('#demo-foo-addrow2').load(window.location.href+ " #demo-foo-addrow2");
                        $('#done1').fadeOut();
                    })

                }
            });
        });


    </script>


    @stop()
