@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
	<div class="panel-heading">
		<h3 class="panel-title">Danh tin tức</h3>
	</div>
	<div class="panel-body">
		<form action="" class="form-inline"  role="form">
			<div class="form-group">
				<input  class="form-control "  name="search" placeholder="Tìm kiếm theo tên">
			</div>
			<button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
			<div class="form-group">

				<a href="{{route('them-tin-tuc')}}" class="btn btn-success fa  fa-plus">  Thêm mới</a>
				<a href="{{route('tin-tuc')}}" class="btn btn-success fa  fa-address-card"> Tin Tức</a>

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
				<th>Tiêu đề</th>
				<th>Tác giả</th>
				<th>Tóm tắt</th>
				<th>Đường dẫn tĩnh</th>
				<th>Hình ảnh</th>
				<th>Trạng thái</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listPost as $item)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td width="100px">{!! $item->title !!}</td>
				<td width="100px">{!! $item->creator !!}</td>
				<td width="200px">{!! $item->content !!}</td>
				<td>{!! $item->slug !!}</td>
				<td>
					<img src="{!!$item->image!!}" alt="" width="auto" height="60px">
				</td>
				<td>
					@if($item->status==1)
						{{"Hiện"}}
						@else
						{{"Ẩn"}}
					@endif

				</td>
				<td width="130px">
					<a href="{{route('sua-tin-tuc',$item->id)}}" title="" class="label label-primary fa  fa-pencil">Sửa</a>
						{!! csrf_field() !!}
						{{method_field('DELETE')}}
					<a href="{{route('xoa-tin-tuc',$item->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i>Xóa</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>
<div class="form-group text-center">
	{{ $listPost->links() }}
</div>


@stop()