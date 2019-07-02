@extends('frontend.master')
@section('content')


<section id="productDetail" class="content">		
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
						<li><a href="{{route('getProduct')}}">Sản phẩm</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>{{$detailProduct->name}}</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-9 col-sm-push-3">
				<div class="row">
					<div class="col-sm-12">
						<div class="title_name">
							<h4>{!!$detailProduct->name!!}</h4>
						</div>
					</div>
				</div>
				<div class="row p_Detail">
					<div class="col-sm-6">
						
						<div class="demo">
							<div class="zoom-section"> 

								<div class="zoom-small-image">
									<a href="" class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"><img src="{!!$detailProduct->image!!}" alt='' title="Optional title display"  style="height: 250px; width: 65%;" /></a>
								</div>
								@foreach($model->images as $img)
								<div class="zoom-desc ">
									
									<p>
										<a href='{!!$img->link!!}' class='cloud-zoom-gallery' title='Red' rel="useZoom: 'zoom1', smallImage: {!!$img->link!!}' "><img class="zoom-tiny-image zoom-anh" style="height: 60px; width: 15%;" src="{!!$img->link!!}" alt = ""/></a>

									</p>
									

								</div>
								@endforeach
								
							</div><!--zoom-section end-->
						</div>


					</div>



					<div class="col-sm-6">
						<div class="pname_Detail">

							<p class="pd_title" >{{$detailProduct->name}}</p>
							<div class="bigstars">
								<div class="rateit" data-rateit-value="3" data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-min="0" data-rateit-max="5">

								</div>
							</div>
							@if($detailProduct->sale_price > 0)
							<p class="p_price"><strong>Giá Sale: </strong>
								<em>
									{{number_format($detailProduct->sale_price)}}.VNĐ
								</em>
							</p>
							@else
							<p class="p_price"><strong>Giá: </strong>
								<em>
									{{number_format($detailProduct->price)}}.VNĐ
								</em>
							</p>
							@endif
							<p><strong>Mã SP:</strong> <b><i>{{$detailProduct->id}}</i></b></p>
						
							<p class="sl"><strong>Số lượng:</strong> 

								<input type="number" name="quantity" value="1" min="1">
								

							</p>

							<a href="{{route('addToCart',$detailProduct->id)}}">

								<button class="btn btn-button" >MUA NGAY</button>
							</a>

						</div>
					</div>
				</div>
				<div class="row tt_sp">
					<div class="col-sm-12">
						<div class="title_name">
							<h4>
								Thông tin sản phẩm
							</h4>
						</div>
					</div>
					<div class="col-sm-12 main_tt">

						<h3>{!!$detailProduct->description!!}</h3>

					</div>
				</div>

				<div class="row sp_lq">
					<div class="col-sm-12">
						<div class="title_name">
							<h4>
								Sản phẩm liên quan
							</h4>
						</div>
					</div>
				</div>
				<div class="row r_lq">
					@if($randomPro != null)
					@foreach($randomPro as $rp)
					<div class="col-sm-4">
						<div class="pro_item hover8">
							<div class="pro_img hover_img">
								<a href="{{route('getDetail',$rp->id)}}"><img src="{!!$rp->image!!}" class="img-responsive"></a>
							</div>
							<div class="pro_name">
								<a href="{{route('getDetail',$rp->id)}}">
									{{$rp->name}}										</a>
								</div>
								<div class="pro_price">
									<ul class="list-inline">
										@if($rp->sale_price > 0)
										<li class="new_price">{!! number_format($rp->sale_price)!!}VNĐ</li>
										<li class="old_price">{{number_format($rp->price)}}VNĐ</li>
										@else
										<li class="new_price">{{number_format($rp->price)}}VNĐ</li>
										<li class="old_price">{!! number_format($rp->sale_price)!!}VNĐ</li>
										@endif
									</ul>
								</div>


								<div class="sale">
									{{number_format(100-(($rp->sale_price/$rp->price)*100))}}%
								</div>
								<ul class="list-unstyled icon_lk">
									<li><a href="{{route('getDetail',$rp->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
									<li><a href="{{route('addToCart',$rp->id)}}" class="add-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
						@endforeach
						@else
						{{"Chưa có sản phẩm nào!Vui lòng thêm sản phẩm"}}
						@endif
					</div>
				</div>
				<div class="col-sm-3 col-sm-pull-9">
					@include('frontend.elements.category')			
				</div>
				
			</div>
		</div>

	</section>


	@stop