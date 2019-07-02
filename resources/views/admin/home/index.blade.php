@extends('admin.layouts.backend')


@section('backend')
	<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$user=DB::table('orderDetail')->where('product_id','>',0)->distinct()->count('product_id')
             }}</h3>

              <h4>Sản Phẩm bán chạy</h4>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('san-pham')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner text-left">
              <h3>{{$user=DB::table('users')->where('level',0)->count()
             }} </h3>

              <h4>Khách hàng</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Xem chi tiết<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{number_format($user=DB::table('order')->where('status',0)->sum('total')
                           )}}.VNĐ</h3>

              <h4>Doanh thu cửa hàng</h4>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('don-hang')}}" class="small-box-footer">Xem chi tiết<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="text-center" style="text-transform: uppercase; margin-top: 150px;">
          <h1 style="font-family: all;">VN Bakery</h1>
          <h3 style="font-family: all; line-height: 50px;">Chào mừng bạn đến với trang quản trị! </h3>

          <img src="{{asset('assets/images/logo1.png')}}" width="500px">
        </div>
      </div>
      <!-- /.row -->
    </section>
@stop()