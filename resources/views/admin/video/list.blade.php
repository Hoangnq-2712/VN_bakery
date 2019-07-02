@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách nhà cung cấp</h3>
	</div>
	<div class="panel-body">
		<form action="" class="form-inline"  role="form">
			<div class="form-group">
				<input  class="form-control "  name="search" placeholder="Tìm kiếm theo tên">
			</div>
			<button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
			<div class="form-group">

				<a href="{{route('them-video')}}" class="btn btn-success fa  fa-plus"> Thêm mới</a>
				<a href="{{route('danh-sach-video')}}" class="btn btn-success fa  fa-address-card"> Danh Sách</a>
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
				<th>Danh mục</th>
				<th>Video</th>
				<th>Trạng thái</th>
				<th>Chức năng</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listVideo as $v)
			<tr>
				<td>{!!$v->id!!}</td>
				<td>{!!$v->name!!}</td>
				<td><?php  $bo=DB::table('category')->select('name')->where('id',$v->category_id)->get();
				foreach ($bo as $b){
					echo $b->name;
				}
				?>
			</td>
			<td>
				<div class="col-sm-4 video-one-video">
					<iframe width="400" height="300" src="{{$v->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</td>
			<td>
				@if($v->status==1)
				{{"Hiển thị"}}
				@else
				{{"Ẩn"}}

				@endif
			</td>
			<td>
				<a href="{{route('sua-video',['id'=> $v->id])}}" class="btn btn-primary fa  fa-pencil">Sửa</a>
				{!! csrf_field() !!}
				{{method_field('DELETE')}}
				<a href="{{route('xoa-video',$v->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="text-center">
	{!! $listVideo->render() !!}
</div>
</div>
@stop()