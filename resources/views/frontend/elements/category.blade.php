<div class="sidebar">
	<div class="sb_item">
		<h4>Danh mục</h4>
		@foreach($listCate as $cate)
		<ul class="list-unstyled menu1">
			<li><a href="{{route('cateProduct',$cate->id)}}">{{$cate->name}}</a></li>
		</ul>
		@endforeach
	</div>
</div>			

