@extends('frontend.master')
@section('content')

<section id="banner1" class="height_h m_top">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 p_right">
				<div id="carousel-id" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<img src="{{asset('assets/uploads/banner/15286924513_1024x1024.jpg')}}">
						</div>
						@foreach($banner as $b)
						<div class="item ">
							<img src="{{$b->image}}">
						</div>
						@endforeach
					</div>
					<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
			
			<div class="col-sm-6" id="fixHeight">
				@if($saleProduct != null)
				@foreach($saleProduct as $s)
				<div class="row">
					<div class="col-sm-12">
						<div class="banner1_r xs_top">
							<div class="row">
								<div class="col-sm-6 col-xs-6">
									<div class="hover8">
										<div class="hover_img">
											<a href="{{route('getDetail',$s->id)}}"><img src="{!!$s->image!!}" class="img-responsive"></a>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-xs-6">
									<div class="r_text text-center">
										<p>Giảm 
											{{number_format(100-(($s->sale_price/$s->price)*100))}}% 
										</p>
										<h1>{{$s->name}}</h1>
										<a href="{{route('getDetail',$s->id)}}">Xem ngay <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				"Chưa có sản phẩm giảm giá nào!Vui lòng thêm sản phẩm";
				@endif
				<!-- đổ dữ liệu sản phẩm -->
				@if($sale != null)
				@foreach($sale as $c)
				<div class="row">
					<div class="col-sm-12">
						<div class="banner1_r">
							<div class="row">
								<div class="col-sm-6 col-xs-6">
									<div class="r_text text-center">
										<p>Giảm 
											{{number_format(100-(($c->sale_price/$c->price)*100))}}% 
										</p>
										<h1>{{$c->name}}</h1>
										<a href="{{route('getDetail',$c->id)}}">Xem ngay <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
									</div>
								</div>
								<div class="col-sm-6 col-xs-6">
									<div class="hover8">
										<div class="hover_img">
											<a href="{{route('getDetail',$c->id)}}"><img src="{!!$c->image!!}" class="img-responsive"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				"Chưa có sản phẩm giảm giá nào!Vui lòng thêm sản phẩm";
				@endif
				<!-- đổ sản phẩm ngẫu nhiên -->

				@if($randomProduct != null)


				<div class="row">
					<div class="col-sm-12">
						<div class="banner1_r xs_top">
							<div class="row">
								<div class="col-sm-6 col-xs-6">
									<div class="hover8">
										<div class="hover_img">
											<a href="{{route('getDetail',$randomProduct->id)}}"><img src="{{$randomProduct->image}}" class="img-responsive"></a>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-xs-6">
									<div class="r_text text-center">
										@if($randomProduct->sale_price > 0)
										<p>Giảm 
											{{number_format(100-(($randomProduct->sale_price/$randomProduct->price)*100))}}% 
										</p>
										@endif
										<h1>{{$randomProduct->name}}</h1>
										<a href="{{route('getDetail',$randomProduct->id)}}">Xem ngay <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				@else
				"Chưa có sản phẩm giảm giá nào!Vui lòng thêm sản phẩm";
				@endif
			</div>
		</div>
	</div>
</section>


<section id="buy_now">
	<div class="container">
		<div class="row m_bottom">
			<div class="col-sm-12">
				<h2 class="title_section">Bạn Nên Lựa Chọn Ngay ?</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 m_b">
				<div class="bn_item hover8">
					<div class="bn_img hover_img">
						<a href="{{route('getProductSale')}}"><img src="{!!$randomSale->image!!}" class="img-responsive" width="350px" height="233px" ></a>
					</div>
					<div class="bn_des">
						<h4 class="tt_des">GIẢM GIÁ {{number_format(100-(($randomSale->sale_price/$randomSale->price)*100))}}%</h4>
						<p class="d_des">Sản phẩm của VN CAKE tập trung vào chất lượng!</p>

					</div>
				</div>
			</div>
			<div class="col-sm-4 m_b15">
				<div class="bn_item hover8 bn_center">
					<div class="hover_img">
						<a href="{{route('getProductSale')}}"><img  src="{{asset('assets/images/1.2.jpg')}}" class="img-responsive" width="350" height="387"></a>
						<div class="xem_them xt_center">
							<a href="{{route('getProductSale')}}">Xem thêm</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 m_b">
				<div class="bn_item hover8">
					<div class="bn_img hover_img">
						<a href="{{route('getProductSale')}}"><img src="{!!$proOther->image!!}" class="img-responsive" width="350px" height="233px" ></a>
					</div>
					<div class="bn_des">
						<h4 class="tt_des">GIẢM GIÁ {{number_format(100-(($proOther->sale_price/$proOther->price)*100))}}%</h4>
						<p class="d_des">Mục tiêu của VN CAKE chính là sức khỏe của con người!</p>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="buffet">
	<div class="container">
		<div class="row m_bottom">
			<div class="col-sm-12">
				<h2 class="title_section">Sản Phẩm Của Cửa Hàng</h2>
			</div>
		</div>
		<div class="row">
			@if($descProduct != null)
			@foreach($descProduct as $d)
			<div class="col-sm-3">
				<div class="pro_item hover8">
					<div class="pro_img hover_img">
						<a href="{{route('getDetail',$d->id)}}"><img src="{{$d->image}}" class="img-responsive"></a>
					</div>
					<div class="pro_name">
						<a href="{{route('getDetail',$d->id)}}">
							{{$d->name}}							</a>
						</div>
						<div class="pro_price">
							<ul class="list-inline">
								@if($d->sale_price > 0)
								<li class="new_price">{!! number_format($d->sale_price)!!}VNĐ</li>
								<li class="old_price">{{number_format($d->price)}}VNĐ</li>
								@else
								<li class="new_price">{{number_format($d->price)}}VNĐ</li>
								<li class="old_price">{!! number_format($d->sale_price)!!}VNĐ</li>
								@endif
							</ul>
						</div>
						@if($d->sale_price >0)
						<div class="sale">
							{{number_format(100-(($d->sale_price/$d->price)*100))}}%
						</div>
						@endif
						<ul class="list-unstyled icon_lk">
							<li><a href="{{route('getDetail',$d->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
							<li><a href="{{route('addToCart',$d->id)}}" class="add-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
				@endforeach
				@else
				"Chưa có sản phẩm giảm giá nào!Vui lòng thêm sản phẩm";
				@endif
			</div>
		</div>
	</section>

	<section id="banner2" class="banner_t"> 
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="hover8">
						<div class="hover_img">
							<a href="{{route('getHome')}}"><img src="{{asset('assets/images/banner_n.jpg')}}" class="img-responsive"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="cocktail">
		<div class="container">
			<div class="row m_bottom">
				<div class="col-sm-12">
					<h2 class="title_section">Sản Phẩm Giảm Giá</h2>
					<p class="p_section">Để làm ra một sản phẩm những người thợ bánh đã thả hết tâm huyết và trách nhiệm nhằm tạo nên một thương hiệu và chất lượng sản phẩm của VN CAKE như bây giờ!</p>
				</div>
			</div>
			<div class="row">
				<!-- Đổ sản phẩm theo dữ liệu $ascProduct -->
				@if($ascProduct != null)
				@foreach($ascProduct as $ap)
				<div class="col-sm-3">
					<div class="pro_item hover8">
						<div class="pro_img hover_img">
							<a href="{{route('getDetail',$ap->id)}}"><img src="{{$ap->image}}" class="img-responsive"></a>
						</div>
						<div class="pro_name">
							<a href="{{route('getDetail',$ap->id)}}">
								{{$ap->name}}</a>
							</div>
							<div class="pro_price">
								<ul class="list-inline">
									@if($ap->sale_price > 0)
									<li class="new_price">{!! number_format($ap->sale_price)!!}VNĐ</li>
									<li class="old_price">{{number_format($ap->price)}}VNĐ</li>
									@else
									<li class="new_price">{{number_format($ap->price)}}VNĐ</li>
									<li class="old_price">{!! number_format($ap->sale_price)!!}VNĐ</li>
									@endif
								</ul>
							</div>

							<div class="sale">
								-25%
							</div>
							<ul class="list-unstyled icon_lk">
								<li><a href="{{route('getDetail',$ap->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
								<li><a href="{{route('addToCart',$ap->id)}}" class="add-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					@endforeach
					@else
					{{"Chưa có sản phẩm nào,Vui lòng thêm sản phẩm!"}}
					@endif
				</div>
			</div>
		</section>

		<section id="banner3" class="banner_t">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 m_b15">
						<div class="hover8">
							<div class="hover_img">
								<a href="{{route('getHome')}}"><img src="{{asset('assets/images/banner1.1.jpg')}}" class="img-responsive"></a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="hover8">
							<div class="hover_img">
								<a href="{{route('getHome')}}"><img src="assets/images/banner1.2.jpg" class="img-responsive"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="banner4" class="banner_t">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="hover8">
							<div class="hover_img">
								<a href="{{route('getHome')}}"><img src="{{asset('assets/images/banner_n2.jpg')}}" class="img-responsive"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="foot">
			<div class="container">
				<div class="row m_bottom">
					<div class="col-sm-12">
						<h2 class="title_section">Sản phẩm mới nhất</h2>

						<div class="card">
							
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class="row">
										@if($hotdealProduct != null)
										@foreach($hotdealProduct as $hp)
										<div class="col-sm-3">
											<div class="pro_item hover8">
												<div class="pro_img hover_img">
													<a href="{{route('getDetail',$hp->id)}}"><img src="{!!$hp->image!!}" class="img-responsive"></a>
												</div>
												<div class="pro_name">
													<a href="{{route('getDetail',$hp->id)}}">
														{{$hp->name}}</a>
													</div>
													<div class="pro_price">
														<ul class="list-inline">
															@if($hp->sale_price > 0)
															<li class="new_price">{!! number_format($hp->sale_price)!!}VNĐ</li>
															<li class="old_price">{{number_format($hp->price)}}VNĐ</li>
															@else
															<li class="new_price">{{number_format($hp->price)}}VNĐ</li>
															<li class="old_price">{!! number_format($hp->sale_price)!!}VNĐ</li>
															@endif
														</ul>
													</div>

													<div class="sale">
														-43%
													</div>
													<ul class="list-unstyled icon_lk">
														<li><a href="{{route('getDetail',$hp->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
														<li><a href="{{route('addToCart',$hp->id)}}" class="add-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
													</ul>
												</div>
											</div>
											@endforeach
											@else
											{{"Chưa có sản phẩm nào, vui lòng thêm sản phẩm vào dữ liệu!"}}
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="news">
			<div class="container">
				<div class="row m_bottom">
					<div class="col-sm-12">
						<h2 class="title_section">Tin tức - Sự kiện</h2>
					</div>
				</div>
				<div class="row">
					@if($listPost != null)
					@foreach($listPost as $p)
					<div class="col-sm-4 m_b1">
						<div class="new_item hover8">
							<div class="bn_img hover_img">
								<a href="{{route('getBlogDetails',$p->id)}}"><img src="{!!$p->image!!}" class="img-responsive"></a>
							</div>
							<div class="new_des">
								<h4 class="n_des"><a href="{{route('getBlogDetails',$p->id)}}">{{$p->title}}</a> </h4>
								<p class="np_des">{!!$p->content!!}</p>
								<div class="xem_them">
									<a href="{{route('getBlogDetails',$p->id)}}">Xem thêm</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif

				</div>
			</div>
		</section>

		@stop