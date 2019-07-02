@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách banner</h3>
	</div>
	<div class="panel-body">
		<form action="" class="form-inline"  role="form">
			<div class="form-group">
				<input  class="form-control "  name="search" placeholder="Tìm kiếm theo tên">
			</div>
			<button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
			<div class="form-group">

				<a href="{{route('them-banner')}}" class="btn btn-success fa  fa-plus">  Thêm mới</a>
				<a href="{{route('banner')}}" class="btn btn-success fa  fa-address-card"> Danh Sách</a>

			</div>
		</form>


	</div>
	@if(Session::has('success'))
	<div class="col-md-6">
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{Session::get('success')}}</strong> Good !
		</div>
	</div>
	@endif
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Đường dẫn tĩnh</th>
				<th>Ảnh</th>
				<th>Trạng thái</th>
				<th>Ngày tạo</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listBanner as $b)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{!!$b->name!!}</td>
				<td>{!!$b->slug!!}</td>
				<td>
					<img src="{!!$b->image!!}" alt="" width="300" height="300">
				</td>
				<td>
					@if($b->status==1)
					{{"Hiển thị"}}
					@else
					{{"Ẩn"}}

					@endif
				</td>
				<td>{!!$b->created_at!!}</td>
				<td>
					<a href="{{route('sua-banner',['id'=> $b->id])}}" class="btn btn-primary fa  fa-pencil">Sửa</a>
					{!! csrf_field() !!}
					{{method_field('DELETE')}}
					<a href="{{route('xoa-banner',$b->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i></a>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop()