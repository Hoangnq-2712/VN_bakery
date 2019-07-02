@extends('frontend.master')
@section('content')

<section id="category" class="content">
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
						<li>Tin tức</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<div class="title_name">
							<h4>Tin tức</h4>
						</div>
					</div>
				</div>
				<!-- Phần chính trang tin tức -->
				@if($listPost != [])
				@foreach($listPost as $p)
				<div class="row m_bottom">
					<div class="col-sm-5">
						<div class="new_img hover8">
							<div class="img hover_img">
								<a href="{{route('getBlogDetails',$p->id)}}"><img src="{{$p->image}}" class="img-responsive"></a>
							</div>
							<div class="date">
								<span class="thang">{{$p->created_at}}</span>
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="new_text">
							<div class="n_des">
								<a href="{{route('getBlogDetails',$p->id)}}">{!!$p->title!!}</a>
							</div>
							<div class="des">{!!$p->content!!}</div>
							<div class="see">
								<a href="{{route('getBlogDetails',$p->id)}}">Xem tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="danger">
					<div class="label label-danger">Chưa có tin tức nào để hiển thị, hãy thêm tin tức!</div>
				</div>
				@endif
				<div class="fb-comments" data-href="https://www.facebook.com/VN-Bakery-1322146464603233/?__tn__=%2Cd%2CP-R&eid=ARAshT9JsA07HKinUUUihntMoIgx9sAQ9yPeTha6LQkDPh1HsoZGIABc8BMETpKZTrtUk4lBgMlfgv9c" data-colorscheme="light" 
				data-numposts="5" data-width="500"></div>

				<!-- Kết thúc phần chính tại đây -->

				<div class="row text-center p_navigation">
					{{$listPost->links()}}
				</div>
			</div>
			<div class="col-lg-3 ffcol-md-3 col-sm-12 col-xs-12">
				@include('frontend.elements.category')
				<!-- comment facebook -->
				<div class="fb-comments" data-href="https://www.facebook.com/VN-Bakery-1322146464603233/?__tn__=%2Cd%2CP-R&eid=ARAshT9JsA07HKinUUUihntMoIgx9sAQ9yPeTha6LQkDPh1HsoZGIABc8BMETpKZTrtUk4lBgMlfgv9c" data-colorscheme="light" 
				data-numposts="5" data-width="200"></div>
				<!-- comment facebook -->
			</div>
		</div>
	</div>
</div>

</section>
<script type="text/javascript" src="js/ajax.js"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem : true

		});

		$("#owl-demo1").owlCarousel({
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem : false,
			itemsMobile : [479, 3],
			items: 4

		});
	});
</script> 


@stop