@extends('admin.layouts.backend')

@section('backend')
	<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
		<div class="panel-heading">
			<h3 class="panel-title">Form điền thông tin</h3>
		</div>
		@if(Session::has('message'))
			<div>
				<div class="alert alert-{{Session::get('level')}}">
					<p>{{Session::get('message')}}</p>
				</div>
			</div>
		@endif
		<div class="panel-body">
			<form action="{{route('them-video')}}" method="POST" role="form">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="">Tên Video</label>
					<input type="text" class="form-control" name="name" placeholder="Nhập tên video" value="{{old('name')}}">
					@if($errors->has('name'))
						<div class="help-block" style="color: red">
							{!!$errors->first('name')!!}
						</div>
					@endif
				</div>
				<div class="form-group">
				<label for="">--Chọn danh mục--</label>
				<select name="category_id" id="inputStatus" class="form-control" value="{{old('category_id')}}">
					<option value="0">--Root--</option>
					@foreach($listCates as $c)
					<option value="{{$c->id}}">{{$c->name}}</option>
					@endforeach
					<?php showCategories($listCates);?>
				</select>
			</div>

				<div class="form-group">
					<label for="">Đường dẫn</label>
					<input type="text" class="form-control" name="link" placeholder="Nhập đường dẫn" value="{{old('link')}}">
					@if($errors->has('link'))
						<div class="help-block" style="color: red">
							{!!$errors->first('link')!!}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="">Trạng thái</label>
					<select name="status" id="inputStatus" class="form-control" >
						<option value="1">Hiển thị</option>
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