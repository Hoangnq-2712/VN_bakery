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
						<li><a href="index.html">Trang chủ</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>Liên hệ</li>
					</ul>
				</div>
			</div>
		</div>
		@if(Session::has('message'))
		<div>
			<div class="alert alert-{{Session::get('level')}}">
				<p>{{Session::get('message')}}</p>
			</div>
		</div>
		@endif
		<div class="row row-ban-do">
			<div class="col-sm-12">
				<br>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d119186.97265254338!2d105.944936!3d21.00895!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ba8444601994739!2zSOG7jWMgVmnhu4duIE7DtG5nIE5naGnhu4dwIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1555579829413!5m2!1svi!2s" width="1140" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

		</div>
		<div class="row tt-lienhe">
			<div class="col-sm-5 ">
				<h3><strong>Cửa hàng VN CAKE</strong></h3>
				<p><i class="fa fa-map-marker" aria-hidden="true"></i> Ký túc xá A2,Tầng 3 phòng 302 Học Viện Nông Nghiệp Việt Nam
				</p>
				<p><i class="fa fa-phone-square" aria-hidden="true"></i>035.3531.265</p>
				<p><i class="fa fa-envelope-square" aria-hidden="true"></i> oppozozohungtq@gmail.com</p>
				<p><i class="fa fa-chrome" aria-hidden="true"></i>https://www.facebook.com/tranhung193</p>

			</div>
			
			<div class="col-sm-7">
				<h3 class="text-center"><strong>Tuyển dụng</strong></h3>
				
				<div class="gui text-center">
					<a href="{{route('getTuyenDung')}}"><input type="submit" class="btn btn-button btn-gui" value="Xin việc làm"/></a>
				</div>
				<div class="text-center">
					<h3><strong></strong></h3>
					<p><i class="fa fa-click te" aria-hidden="true">Hãy click và điền đầy đủ thông tin giúp chúng tôi có thể liên hệ được với bạn!</i>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>


@stop