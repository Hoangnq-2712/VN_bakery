@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
  <div class="panel-heading">
    <h3 class="panel-title">Danh sách sản phẩm</h3>


  </div>
  <div class="panel-body">
   <form action="" class="form-inline"  role="form">
    <div class="form-group">
      <input  class="form-control "  name="search" placeholder="Tìm kiếm theo tên">
    </div>
    <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
    <div class="form-group">

      <a href="{{route('them-san-pham')}}" class="btn btn-success fa  fa-plus"> Thêm mới</a>
      <a href="{{route('san-pham')}}" class="btn btn-success fa  fa-address-card"> Danh Sách</a>
    </div>
  </form>
</div>
@if(Session::has('level'))
  <div class="col-md-6">
    <div class="alert alert-{{Session::get('level')}}">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>{{Session::get('message')}}</strong> Good !
    </div>
  </div>
  @endif
<table class="table table-hover">
  <thead>
    <tr>
      <th>STT</th>
      <th>Mã SP</th>
      <th>Tên sản phẩm</th>
      <th>Đường dẫn tĩnh</th>
      <th>Hình ảnh</th>
      <th>Giá</th>
      <th>Giá sale</th>
      <th>Danh mục</th>
      <th>Trạng thái</th>
      <th>Ngày tạo</th>
      <th>Chức năng</th>
    </tr>
  </thead>
  <tbody>
    @foreach($listProducts as $item)
    <tr>


      <td>{{$loop->iteration}}</td>
      <td>{!! $item->id !!}VNB</td>
      <td>{!! $item->name !!}</td>
      <td>{!! $item->slug !!}</td>
      <td>
        <img src="{!!$item->image!!}" alt="" width="100px" height="110px">
      </td>
      <td>{{number_format($item->price)}} VND</td>
      <td>{{number_format($item->sale_price)}} VND</td>
      <td>
        <?php
        $cate = DB::table('category')->select('id','name')->where('id', '=', $item->category_id)->first();
        echo $cate->name;
        ?>
      </td>

      <td>
        @if($item->status==1)

        {{"Hiển thị"}}
        @else
          @if($item->status==2)
            {{"Sản phẩm Hot"}}
          @else
            {{"Ẩn"}}
          @endif

        @endif
      </td>
      <td>{{$item->created_at}}</td>



      <td>


        <a href="{{route('sua-san-pham',$item->id)}}" title="" class="btn btn-primary"><i class="fa fa-edit"></i></a>


       {!! csrf_field() !!}
       {{method_field('DELETE')}}
       <a href="{{route('xoa-san-pham',$item->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i></a>

       <a href="{{route('anh-chi-tiet',$item->id)}}" title="" class="btn btn-primary"><i class="fa fa-eye"></i></a>

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
{{ $listProducts->links() }}
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>


@stop()