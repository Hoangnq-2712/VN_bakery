@extends('frontend.master')
@section('content')
<section id="product" class="content">
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
						<li>Sản phẩm</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-9 col-sm-push-3">
				<div class="row">
					<div class="col-sm-12">
						<div class="title_name">
							<h4>Tất cả sản phẩm</h4>
						</div>
					</div>
				</div>
				<div class="row">
					@if($listProduct != null)
					@foreach($listProduct as $item)
					<div class="col-sm-4">
						<div class="pro_item hover8">
							<div class="pro_img hover_img">
								<a href="{{route('getDetail',$item->id)}}"><img src="{!!$item->image!!}" class="img-responsive anhsp"></a>
							</div>
							<div class="pro_name">
								<a href="{{route('getDetail',$item->id)}}">{{$item->name}}</a>
							</div>
							<div class="pro_price">
								<ul class="list-inline">
									@if($item->sale_price > 0)
									<li class="new_price">{!! number_format($item->sale_price)!!}VNĐ</li>
									<li class="old_price">{{number_format($item->price)}}VNĐ</li>
									@else
									<li class="new_price">{{number_format($item->price)}}VNĐ</li>
									<li class="old_price">{!! number_format($item->sale_price)!!}VNĐ</li>
									@endif
								</ul>
							</div>

							@if($item->sale_price > 0)
							<div class="sale">
								{!!number_format(100-($item->sale_price / $item->price)*100)!!}%							
							</div>
							@endif
							<ul class="list-unstyled icon_lk">
								<li><a href="{{route('getDetail',$item->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
								<li><a href="{{route('addToCart',$item->id)}}"><i class="fa fa-shopping-cart " aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					@endforeach
					@endif

					
				</div>
				

				<div class="row text-center p_navigation">
					{{$listProduct->links()}}
				</div>
			</div>
			<div class="col-sm-3 col-sm-pull-9">
				@include('frontend.elements.category')				
			</div>
		</div>
	</div>

</section>
@stop