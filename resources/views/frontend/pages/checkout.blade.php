@extends('frontend.master')
@section('content')

<section id="contact" class="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="banner_product">
					<img src="{{asset('assets/images/banner_product.jpg')}}" class="img-responsive">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="title_page">
					<ul class="list-inline">
						<li><a href="{{route('getHome')}}">Trang chủ</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>Thông tin xin việc!</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row row-ban-do">
			<div class="col-sm-12">
				
			</div>

		</div>
		<div class="row tt-lienhe">
			<div class="col-sm-5 ">
				

			</div>
			<div class="col-sm-7">

				
			</div>
			<div class="text-center">
				<h3><strong>Hãy điền đầy đủ thông tin giúp chúng tôi có thể liên hệ được với bạn!</strong></h3>
				<p><i class="fa fa-click te" aria-hidden="true"></i>
				</p>
			</div>
			<div class="col-sm-12">
				@if(Session::has('success'))
				<div class="col-md-6">
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>{{Session::get('success')}}</strong> Good !
					</div>
				</div>
				@endif
				<form action="{{route('postTuyenDung')}}" method="POST" role="form" >
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="item-contact">
								<label for="ho-ten">Họ và tên*:</label>
								<input type="text" class="form-control" id="ho-ten" name="name"  placeholder="Họ và tên" >
								@if($errors->has('name'))
								<div class="help-block" style="color: red">
									{!!$errors->first('name')!!}
								</div>
								@endif
							</div>
							<div class="item-contact">
								<label for="mail">Email*:</label>
								<input type="mail" class="form-control" id="mail" name="email"  placeholder="Email">
								@if($errors->has('email'))
								<div class="help-block" style="color: red">
									{!!$errors->first('email')!!}
								</div>
								@endif
							</div>
							<div class="item-contact">
								<label for="sdt">Số điện thoại:</label>
								<input type="number" class="form-control" id="sdt" name="phone" placeholder="Số điện thoại">
								@if($errors->has('phone'))
								<div class="help-block" style="color: red">
									{!!$errors->first('phone')!!}
								</div>
								@endif
							</div>
							<div class="item-contact">
								<label for="dia-chi">Địa chỉ:</label>
								<input type="text" class="form-control" id="dia-chi" name="address" placeholder="Địa chỉ">
								@if($errors->has('address'))
								<div class="help-block" style="color: red">
									{!!$errors->first('address')!!}
								</div>
								@endif
							</div>
							<div class="item-contact">
								<label for="requested" class="requested">Vị trí ứng tuyển và ý kiến của bạn*:</label>
								<textarea type="text" class="form-control"  name="requested" placeholder="Ý kiến của bạn" rows="6" ></textarea>
								@if($errors->has('requested'))
								<div class="help-block" style="color: red">
									{!!$errors->first('requested')!!}
								</div>
								@endif
							</div>
							<div class="gui text-center">
								<input type="submit" class="btn btn-button btn-gui" value="Gửi Đi"/>
							</div>

						</div>

					</div>
				</form>
			</div>

		</div>
	</div>
</section>

@stop