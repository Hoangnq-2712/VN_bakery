<header>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="header_top">
					<div class="row">
						<div class="col-sm-5 hidden-xs">
							<ul class="list-inline ht_left">
								<li><i class="fa fa-phone" aria-hidden="true"></i> Hotline: 01676.819.115</li>
							</ul>
						</div>
						<div class="col-sm-7">
							@if(Auth::Check())
							<ul class="list-inline ht_right">
								<li><a href="{{route('getHome')}}"><i class="fa fa-user" aria-hidden="true"></i> Chào {{Auth::user()->name}}</a></li>
								<li><a href="{{route('logout')}}"><i class="fa fa-plus" aria-hidden="true"></i> Đăng xuất</a></li>
								<li><a href="{{route('getAccount',Auth::user()->id)}}"><i class="fa fa-plus" aria-hidden="true"></i>Cập nhật tài khoản</a></li>
								

								<!--lịch sử đơn hàng -->
								@if(Cart::count() > 0)
								 <li id="qty"><a href="{{route('viewCart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng <span><b>{{ Cart::count()}}</b> </span>sản phẩm</a></li>
								 @else
									 <li id="qty"><a href="{{route('historyCart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Lịch sử đơn hàng </a></li>
								 @endif
							</ul>
							@else
							<ul class="list-inline ht_right">
								<li><a href="{{route('login')}}"><i class="fa fa-user" aria-hidden="true"></i> Đăng nhập</a></li>
								<li><a href="{{route('register')}}"><i class="fa fa-plus" aria-hidden="true"></i> Đăng kí</a></li>

								
							</ul>
							@endif
						</div>

					</div>
				</div>
				<div class="header_center">
					<div class="row">
						<div class="col-sm-4">
							<div class="logo">
								<a href="{{route('getHome')}}"><img src="{{asset('assets/images/logo1.png')}}" class="img-responsive"></a>
							</div> 
						</div>
						<div class="col-sm-4">

						</div>
						<div class="col-sm-4 hidden-xs">
							<div class="search">
								<div class="custom-search-input">
									
									<form action="{{route('searchProduct')}}" method="POST" >
										<div class="input-group col-md-12">
											{!! csrf_field () !!}
											<input type="text" class="form-control" name="q"  id="search" placeholder="Nhập tìm kiếm..." required="required" />
											<span class="input-group-btn">
												<button class="btn btn-info" type="submit">
													<i class="glyphicon glyphicon-search"></i>
												</button>
											</span>
										</div>
									</form>
								</div>
							</div>
							<div class="link_lk">
								<ul class="list-inline">
									<li><a class="fb" href="https://www.facebook.com/VN-Bakery-1322146464603233/?modal=admin_todo_tour" target="_blank" aria-hidden="true"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a class="tw" href="https://www.facebook.com/VN-Bakery-1322146464603233/?modal=admin_todo_tour" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a class="go" href="https://www.facebook.com/VN-Bakery-1322146464603233/?modal=admin_todo_tour" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>
									<li><a class="yu" href="https://www.facebook.com/VN-Bakery-1322146464603233/?modal=admin_todo_tour" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<nav>
					<div id='cssmenu'>
						<ul>
							<li class="active"><a href="{{route('getHome')}}">Trang chủ</a></li>
							<li><a href="{{route('getAbout')}}">Giới thiệu</a></li>
							<li><a href="{{route('getProduct')}}">Thực đơn</a>

							</li>
							<li><a href="{{route('getBlog')}}">Tin tức</a></li>
							<li class='has-sub'><a href='javascript:void(0);'>Thư viện</a>
								<ul>
									<li class=''><a href="{{route('getProductSale')}}">Sản phẩm Sale</a></li>
									<li class=''><a href="{{route('getAlbum')}}">Albums</a></li>
									<li class=''><a href="{{route('getVideo')}}">Videos</a></li>
								</ul>
							</li>
							<li><a href="{{route('getContact')}}">Liên hệ</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>