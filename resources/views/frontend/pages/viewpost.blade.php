@extends('frontend.master')
@section('content')
<section id="viewNews" class="content">
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
						<li><a href="{{route('getBlog')}}">Tin tức</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>
							{{$detailPost->title}}						</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12">
							<div class="title_name">
								<h4>
									{{$detailPost->title}}								<p class="title_date" style="font-size: 10px;">Ngày đăng tin:{{$detailPost->created_at}}	</p>
								</h4>
							</div>
						</div>
					</div>
					<div class="row p_Detail">
						<div class="col-sm-12">
							<div class="view_detail">
								<div class="info-description-article clearfix">
									{!!$detailPost->body!!}	
								</div>
							</div>
						</div>						
					</div>
				</div>	
			</div>	
			

			<div class="row p_Detail">
				<div class="col-sm-12">
					<div class="author_info"> 
						<b>Tác giả:{!!$detailPost->creator!!}</b>	<i class="fa fa-pencil" aria-hidden="true"></i>
					</div>
				</div>	
			</div>
			
			<div class="row sp_lq">
				<div class="col-sm-12">
					<div class="title_name">
						<h4>
							Tin tức khác
						</h4>
					</div>
				</div>
			</div>
			<div class="row">
				@if($listPost != [])
				@foreach($listPost as $p)
				<div class="col-sm-4 m_b1">
					<div class="new_item hover8">
						<div class="bn_img hover_img">
							<a href="{{route('getBlogDetails',$p->id)}}"><img src="{{$p->image}}" class="img-responsive"></a>
						</div>
						<div class="new_des">
							<h4 class="n_des"><a href="{{route('getBlogDetails',$p->id)}}">{{$p->title}}</a> </h4>
							<p class="np_des">{{$p->content}}</p>
							<div class="xem_them">
								<a href="{{route('getBlogDetails',$p->id)}}">Xem thêm</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="text-center">
					<span class="label label-danger">Chưa có tin tức!</span>	
				</div>
				@endif
				
			</div>
		</div>
		

	</section>
	@stop