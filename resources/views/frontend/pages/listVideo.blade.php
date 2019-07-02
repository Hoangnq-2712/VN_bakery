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
						<li><a href="index.html">Trang chủ</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>Videos</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-9 col-sm-push-3">
				<div class="row">
					<div class="col-sm-12">
						<div class="title_name">
							<h4>Videos</h4>
						</div>
					</div>
				</div>
				<div class="row row-full-video">

					@if($listVideo != [])
					@foreach($listVideo as $v)
					<div class="col-sm-4 video-one-video">
						
						
						<iframe width="100%" height="300" src="{{$v->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

						<div class="pro_name"><a href="{{$v->link}}
							">{{$v->name}}</a></div>
						</div>
						@endforeach()
						@else
						<div class="container">
							<div class="panel panel-default">
								<div class="panel-heading">Chưa có video nào được đăng tải vùi lòng kiểm tra lại!</div>
							</div>
						</div>
						@endif

						<div class="text-center">
							 {{ $listVideo->links() }} 
						</div>

					</div>
					
				</div>
				<div class="col-sm-3 col-sm-pull-9">
					
					@include('frontend.elements.category')
				</div>
			
			</div>
		</div>
		
	</section>


	@stop