@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách sản phẩm</h3>


    </div>
    <div class="panel-body">
        <form action="" class="form-inline"  role="form">
           
            <div class="form-group">

                <a href="{{route('san-pham')}}" class="btn btn-success fa  fa-address-card"> Danh Sách</a>
            </div>
            
        </form>

    </div>

    @if(Session::has('message'))
    <div class="alert alert-success">{!! Session::get('message') !!}</div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh chi tiết</th>
                <th>Ngày tạo</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($model->images as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><?php
                $product = DB::table('product')->select('id','name')->where('id', '=', $item->product_id)->first();
                echo $product->name;
                ?>

            </td>
            <td>
                <img src="{!!$item->link!!}" alt="" width="360px" height="240px">
            </td>

            <td>{{$item->created_at}}</td>
            <td>
                <a href="{{route('sua-san-pham',$item->id)}}" title="" class="label label-primary">Sửa</a>

                <form action="{!! route('xoa-san-pham',$item->id) !!}" method="POST">
                    {!! csrf_field() !!}
                    {{method_field('DELETE')}}
                    <button type="submit" class="label label-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6">

            </td>
        </tr>
    </tfoot>
</table>
</div>

<script src="/vendor/laravel-filemanager/js/lfm.js"></script>


@stop()