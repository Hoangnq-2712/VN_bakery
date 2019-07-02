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
						<li>Danh Mục</li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>{{$nameCate->name}}</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-9 col-sm-push-3">
				<div class="row">
					<div class="col-sm-12">
						<div class="title_name">
							<h4><i>Danh mục: </i>{{$nameCate->name}}</h4>
							<div class="pro_name">
								<h3 style="font-size:23"><b><i>Gồm có:</i> {{$countPro}} sản phẩm</b></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					@if($listProducts != null )
					@foreach($listProducts as $lp)
					<div class="col-sm-4">
						<div class="pro_item hover8">
							<div class="pro_img hover_img">
								<a href="{{route('getDetail',$lp->id)}}"><img src="{{$lp->image}}" class="img-responsive anhsp" ></a>
							</div>
							<div class="pro_name">
								<a href="{{route('getDetail',$lp->id)}}">{{$lp->name}}</a>
								@if($lp->sale_price > 0)
								<div class="text-center">
									<span style="color: red"><b>Giảm {!!number_format(100-($lp->sale_price / $lp->price)*100)!!}%	</b></span>						
								</div>
								@endif
							</div>
							<div class="pro_price">
								<ul class="list-inline">
									@if($lp->sale_price > 0)
									<li class="new_price">{!! number_format($lp->sale_price)!!}VNĐ</li>
									<li class="old_price">{{number_format($lp->price)}}VNĐ</li>
									@else
									<li class="new_price">{{number_format($lp->price)}}VNĐ</li>
									<li class="old_price">{!! number_format($lp->sale_price)!!}VNĐ</li>
									@endif
								</ul>
							</div>

							<ul class="list-unstyled icon_lk">
								<li><a href="{{route('getDetail',$lp->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
								<li><a href="{{route('addToCart',$lp->id)}}" class="add-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					@endforeach
					@else
					{{"Chưa có sản phẩm nào với danh mục tương ứng!"}}
					@endif
				</div>
				<div class="row text-center p_navigation">
					{{$listProducts->links()}}
				</div>
			</div>
			<div class="col-sm-3 col-sm-pull-9">
				@include('frontend.elements.category')
			</div>
		</div>

	</div>

</section>


@stop