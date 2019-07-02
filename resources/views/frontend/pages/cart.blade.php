@extends('frontend.master')
@section('content')
<script type="text/javascript">
	function updateCart(qty,rowId){
		$.get(
			'{{asset('gio-hang/update')}}',
			{qty:qty,rowId:rowId},
			function(){
				location.reload();
			}
			);
	}

</script>
<section id="cart">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title_page">
					<ul class="list-inline">
						<li><a href="index.html">Trang chủ</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>Giỏ hàng của bạn</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row c_Detail">
			@if(Session::has('message'))
			<div>
				<div class="alert alert-{{Session::get('level')}}">
					<p>{{Session::get('message')}}</p>
				</div>
			</div>
			@endif

			<div class="col-sm-9 col-sm-push-3">
				<form action="handle_cart.html?&action=update_all" method="post">
					<div class="table-responsive img_cart">
						<table class="table table-bordered table-hover">
							<tr >
								<th style="width: 5%;"class="text-center" >STT</th>
								<th style="width: 15%;" class="text-center">Ảnh sản phẩm</th>
								<th style="width: 25%;" class="text-center">Tên sản phẩm</th>
								<th style="width: 15%;" class="text-center">Đơn giá</th>
								<th style="width: 10%;" class="text-center">Số lượng</th>
								<th style="width: 15%;" class="text-center">Thành tiền</th>
								<th style="width: 5%;" class="text-center">Xóa</th>
							</tr>
							<form method="POST" action="">
								<input name="_token" type="hidden"  value="{!! csrf_token() !!}">
								@if(count($content)>0)
								@foreach($content as $item)
								<tr>	
									<td>{{$item->id}}</td>
									<td class="image"><img style="height: 150px; width: 200px;margin-left: auto; margin-right: auto;" src="{{$item->options['images']}}" class="img-responsive text-center"></td>
									<td><b>{{$item->name}}</b></td>
									<td class="text-danger">
										{{number_format($item->price)}}<sup><u>vnđ</u></sup>
									</td>
									<td >


										<input   style="width: 60px;" type="number"   value="{{$item->qty}}" onchange="updateCart(this.value,'{{$item->rowId}}')" min="1">



									</td>                                
									<td class="text-danger">{{number_format(($item->price)*($item->qty))}}<sup><u>đ</u></sup></td>
									
									<td>
										<a href="{{route('cart.delete',$item->rowId)}}" onclick="return confirm('bạn có chắc chắn xóa không? ')"><i class="fa fa-trash-o"></i></a>

									</td>
								</tr>
								@endforeach
								@endif

							</form>
							
							<tr class="end">
								
								<td colspan="4">
									<a href="{{route('getProduct')}}" class="btn btn-button">+ Mua thêm</a>
									<a href="{{route('destroyCart')}}" class="btn btn-button" onclick="return confirm('bạn có chắc chắn hủy đơn hàng này không? ')">Hủy đơn hàng</a>
								</td>
								<td class="text-right">
									Tổng cộng:                     
								</td>
								<td colspan="2" class="text-danger text-left">
									<strong>{{Cart::subTotal()}}<sup><u>đ</u></sup></strong>
								</td>
							</tr>
						</table>
					</div>
				</form>
				<div class="panel_container">
					@if(Cart::subTotal() > 0)
					<h3>Thông tin đặt hàng</h3>
					<p>Vui lòng điền đầy đủ và chính xác thông tin để chúng tôi hoàn thành đơn hàng!</p>
					
					<form action="{{route('postCheckOut')}}" method="POST" role="form" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="col-sm-6">
								<label for="name">Họ và tên</label>
								<input type="text" name="name"  value="{{Auth::user()->name}}" class="form-control" placeholder="Nhập họ tên.." >
								@if($errors->has('name'))
								<div class="help-block" style="color: red">
									{!!$errors->first('name')!!}
								</div>
								@endif
							</div>
							<div class="col-sm-6">
								<label for="name">Số điện thoại</label>
								<input type="number" name="phone" min="0" class="form-control" value=""  placeholder="Nhập số điện thoại..">
								@if($errors->has('phone'))
								<div class="help-block" style="color: red">
									{!!$errors->first('phone')!!}
								</div>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
								<label for="name">Email</label>
								<input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" required="" placeholder="Nhập Email..">
								@if($errors->has('email'))
								<div class="help-block" style="color: red">
									{!!$errors->first('email')!!}
								</div>
								@endif
							</div>
							<div class="col-sm-6">
								<label for="name">Địa chỉ</label>
								<input type="text" name="address" value="" class="form-control" placeholder="Nhập địa chỉ">
								@if($errors->has('address'))
								<div class="help-block" style="color: red">
									{!!$errors->first('address')!!}
								</div>
								@endif
							</div>
						</div>
						<div class="form-group">  
							<div class="col-sm-12">
								<label for="name">Ghi chú</label>
								<textarea type="text" class="form-control" name="note" placeholder="Nhập nội dung" rows="5"></textarea>  
								@if($errors->has('note'))
								<div class="help-block" style="color: red">
									{!!$errors->first('note')!!}
								</div>
								@endif 
							</div>
						</div>

						<div class="text-center">
							<button type="submit" class="btn btn-button"><a href="{{route('getcheckOut')}}"><b>Đặt hàng</b></a></button>
						</div>
					</form>
					@else
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Bạn chưa đặt hàng!!!</strong>Vui lòng thêm sản phẩm vào giỏ hàng của bạn để tiếp tục đặt hàng!
					</div> 	 	

					@endif
				</div>

			</div>

			<div class="col-sm-3 col-sm-pull-9">
			@include('frontend.elements.category')</div>

		</div>
	</div>
</section>
@stop