@extends('admin.layouts.backend')


@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách danh mục</h3>
	</div>

	<div class="panel-body">
		<form action="" class="form-inline"  role="form">
			<div class="form-group">
				<input  class="form-control "  name="search" placeholder="Tìm kiếm theo tên">
			</div>
			<button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
			<div class="form-group">

				<a href="{{route('them-danh-muc')}}" class="btn btn-success fa  fa-plus">  Thêm mới</a>
				<a href="{{route('danh-muc')}}" class="btn btn-success fa  fa-address-card"> Danh Sách</a>

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
				<th>Tên</th>
				<th>Đường dẫn tĩnh</th>
				<th>Danh mục cha</th>
				<th>Trạng thái</th>
				<th>Ngày tạo</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listCates as $c)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{!!$c->name!!}</td>
				<td>{!!$c->slug!!}</td>
				<td><?php  $bo=DB::table('category')->select('name')->where('id',$c->parent)->get();
				foreach ($bo as $b){
					echo $b->name;
				}
				?>
			</td>
			<td>
				@if($c->status==1)
				Hiển thị
				@else
				Ẩn
				@endif
			</td>
			<td>{!!$c->created_at!!}</td>
			<td>
				<a href="{{route('sua-danh-muc',['id'=> $c->id])}}" class="btn btn-primary fa  fa-pencil">Sửa</a>
				{!! csrf_field() !!}
				{{method_field('DELETE')}}
				<a href="{{route('xoa-danh-muc',$c->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="text-center">
	{!! $listCates->render() !!}
</div>


</div>
@stop()