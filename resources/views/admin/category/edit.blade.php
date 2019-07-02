@extends('admin.layouts.backend')


@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Sửa danh mục</h3>
	</div>
	@if(Session::has('message'))
	<div>
		<div class="alert alert-{{Session::get('level')}}">
			<p>{{Session::get('message')}}</p>
		</div>
	</div>
	@endif
	<div class="panel-body">
		<form action="{{route('danh-muc.update',$listCates->id)}}" method="POST" role="form">
			{!! csrf_field() !!}
			{!! method_field('PUT') !!}
			<div class="form-group">
				<label for="">Tên danh mục</label>
				<input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{$listCates->name}}">
				@if($errors->has('name'))
				<div class="help-block" style="color: red">
					{!!$errors->first('name')!!}
				</div>
				@endif
			</div>
			<div class="form-group">
				<label for="">Đường dẫn tĩnh</label>
				<input type="text" class="form-control" name="slug" placeholder="Nhập tên danh mục" value="{{$listCates->slug}}">
				@if($errors->has('slug'))
				<div class="help-block" style="color: red">
					{!!$errors->first('slug')!!}
				</div>
				@endif
			</div>
			

			<div class="form-group">
				<label for="">Danh mục cha</label>
				<select name="parent" id="inputStatus" class="form-control" required="required">
					<option value="0">--Chọn danh mục cha--</option>
					@foreach($listCate as $c)

					<?php  ?>
					<option value="{{$c->id}}">{{$c->name}}</option>
					@endforeach
					<?php showCategories($listCate);?>
				</select>

			</div>

			<div class="form-group">
				<label for="">Trạng thái</label>
				<select name="status" id="inputStatus" class="form-control" required="required" value="">
					<option value="1" selected>Hiển thị</option>
					<option value="0">Ẩn</option>
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Cập nhật</button>
			</div>
		</form>
	</div>
</div>
@stop()