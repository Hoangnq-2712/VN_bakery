@extends('frontend.master')
@section('content')

<section id="login">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12">
				<div class="register">
					<h4>Cập nhật thông tin </h4>
					@if(Session::has('message'))
					<div>
						<div class="alert alert-{{Session::get('level')}}">
							<p>{{Session::get('message')}}</p>
						</div>
					</div>
					@endif
					<form  action="{{route('postAccount.update',Auth::id())}}" method="POST" role="form" name="formdangky"  enctype="multipart/form-data">
						{{ csrf_field() }}
						{!! method_field('PUT') !!}
						<div class="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5>Họ và tên</h5>
										<input type="text" class="form-control" id="names" name="name" value="{{$listUsers->name}}" required="required">

									</div>

									<div class="form-group">
										<h5>Điện thoại</h5>
										<input type="text" class="form-control" id="phome" name="phone" value=" {{$listUsers->phone}}" required="required">

									</div>
									<div class="form-group">
										<h5>Email</h5>
										<input type="email" class="form-control" name="email" value=" {{$listUsers->email}}" required="required">
										
									</div>
									<div class="form-group">
										<h5>Giới tính</h5>
										<select name="" id="">
											<option value="1"  @if($listUsers->gender ==1)  ckecked @endif >Nam</option>
											<option value="0" @if($listUsers->gender ==0)  ckecked @endif >Nữ</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5>Ngày sinh</h5>
										<input type="date" class="form-control" name="email" value=" {{$listUsers->birthday}}">
									</div>
									
									<div class="form-group">
										<h5>Mật khẩu mới</h5>
										<input type="password" class="form-control" id="pw1" name="pasword" placeholder="*****" required="required">
										
									</div>

									<div class="form-group">
										<h5>Xác nhận mật khẩu mới</h5>
										<input type="password" class="form-control"  name="repassword" placeholder="*****" required="required">
										@if($errors->has('repassword'))
										<div class="help-block" style="color: red">
											{!!$errors->first('repassword')!!}
										</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
							<input type="submit" name="Submit" class="btn btn-button " value="Cập nhật" /> 
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>
</section>

@stop