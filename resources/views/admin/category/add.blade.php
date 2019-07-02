@extends('admin.layouts.backend')


@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Form thêm danh mục</h3>
	</div>
	@if(Session::has('message'))
	<div>
		<div class="alert alert-{{Session::get('level')}}">
			<p>{{Session::get('message')}}</p>
		</div>
	</div>
	@endif
	<div class="panel-body">
		<form action="{{route('them-danh-muc')}}" method="POST" role="form">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="">Tên danh mục</label>
				<input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{old('name')}}">
				@if($errors->has('name'))
				<div class="help-block" style="color: red">
					{!!$errors->first('name')!!}
				</div>
				@endif
			</div>

			<div class="form-group">
				<label for="">Danh mục cha</label>
				<select name="parent" id="inputStatus" class="form-control" required="required"  value="{{old('parent')}}">
					<option value="0">--Chọn danh mục cha--</option>
					@foreach($listCates as $c)
					<option value="{{$c->id}}">{{$c->name}}</option>
					@endforeach
					<?php showCategories($listCates);?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Trạng thái</label>
				<select name="status" id="inputStatus" class="form-control" required="required">
					<option value="1" selected>Hiển thị</option>
					<option value="0">Ẩn</option>
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>
		</form>
	</div>
</div>
@stop()