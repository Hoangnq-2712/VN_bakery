@extends('frontend.master')
@section('content')

<section id="viewAlbums" class="content">
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
						<li>Albums</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-9 col-sm-push-3">
				<div class="row">
					<div class="col-sm-12">
						<div class="title_name">
							<h4>Albums sản phẩm</h4>
						</div>
					</div>
				</div>
				<div class="row row-anh">
					@if($listAlbum != null)
					@foreach($listAlbum as $la)
					<div class="col-sm-4">
						<div class="pro_item hover8">
							<div class="pro_img hover_img">
								<a href="{{route('getAlbum')}}"><img src="{{$la->image}}" class="img-responsive"></a>
							</div>
							<div class="pro_name">
								<a href="viewAlbums.html">
								{{$la->name}}					</a>
							</div>
						</div>
					</div>
					@endforeach
					@else
					{{"Chưa có sản phẩm nào trong danh sách!"}}
					@endif
					
				</div>
				<div class="row text-center p_navigation">
					{{$listAlbum->links()}}
				</div>


			</div>
			<div class="col-sm-3 col-sm-pull-9">
				@include('frontend.elements.category')
					
			</div>
		</div>
	</div>

</section>
<link rel="stylesheet" href="css/baguetteBox.css">

<script src="assets/js/baguetteBox.js" async></script>
<script src="assets/js/plugins.js" async></script>
<script>
	window.onload = function() {
		if(typeof oldIE === 'undefined' && Object.keys)
			hljs.initHighlighting();

		baguetteBox.run('.baguetteBoxOne');				
	};
</script>


@stop