@extends('frontend.master')
@section('content')

	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="banner_product">
						<img src="assets/images/banner_product.jpg" class="img-responsive">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="title_page">
						<ul class="list-inline">
							<li><a href="{{route('getHome')}}">Trang chủ</a></li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
							<li>Giới thiệu</li>
						</ul>
					</div>
				</div>
			</div>	

			<div class="row">	
				<div class="col-sm-12">	
					<div class="introduce">
						<h2>Giới thiệu chung</h2>
					</div>
					<div class="intro_content">
						<p>Với tốc độ phát triển công nghệ thông trong thời đại công nghiệp hóa, việc sử dụng mạng Internet đã trở nên phổ biến. Tìm kiếm thông tin và giao dịch thương mại trên internet chính là xu hướng hiện nay.</p>
						<p>Với nhiệm vụ là đem đến cho những các bạn những sản phẩm tốt nhất, những món ăn đa dạng, tạo cảm giác hài lòng đối với khách hàng.</p>
						<p>Vì vậy hôm nay chúng tôi xin giới thiệu với các bạn website bán đồ ăn trực tuyến. Hiện nay với khả năng phát triển đáng kinh ngạc của Internet cho nên nhiều website bán hàng trực tuyến từ quần áo,đồ gia dụng,món đồ ăn,... cũng không ngừng sinh ra.Nhưng vì sao bạn nhất định phải chọn website của chúng tôi ?</p>
						<h3>Sứ mệnh</h3>
						<p>“Ẩm thực và hơn thế nữa!”</p>
						<p>“Ẩm thực và hơn thế nữa!” là câu slogan thể hiện sứ mệnh, phương châm, hướng đi mà Website bán đồ ăn trực tuyến đã lựa chọn. Sứ mệnh của chúng tôi là mang đến cho khách hàng những trải nghiệm tuyệt vời và đúng nghĩa nhất về ẩm thực. Ở đó, ẩm thực không chỉ đơn giản là ngon miệng, mà phải đảm bảo an toàn vệ sinh và dinh dưỡng.</p>
						<p>Sức khỏe của khách hàng luôn là một trong các vấn đề hàng đầu được chúng tôi quan tâm và chú trọng. Những món ăn của Website bán đồ ăn trực tuyến được đầu tư nghiên cứu và chế biến theo hướng vận dụng các bài thuốc có giúp tăng cường sức khỏe, ngăn ngừa ung thư, làm chậm tiến trình lão hóa, hỗ trợ điều trị các bệnh về xương khớp... Món ăn của Nhà Hàng hứa hẹn sẽ đem đến sự ngon miệng và hài lòng nhất cho khách hàng</p>
						<h3>Giá trị cót lõi</h3>
						<p>An toàn: Trong ngành kinh doanh ẩm thực, an toàn về sức khỏe được xem là yếu tố quan trọng nhất. Tuy nhiên, hiện nay rất nhiều cơ sở kinh doanh vì lợi nhuận mà lại bỏ quên yếu tố này. Với tâm niệm mong muốn bảo vệ sức khỏe của khách hàng, Web chúng tôi luôn luôn đề cao vấn đề an toàn thực phẩm ở mọi công đoạn từ lựa chọn và bảo quản nguyên liệu, quá trình chế biến món ăn đến khi thành phẩm.</p>	
						<div class="hover8">
							<div class="hover_img">
								<img src="assets/images/introduce.jpeg" class="img-responsive" id="img_center">
							</div>
						</div>
						<p>Chuyên nghiệp: Sự chuyên nghiệp là một trong những giá trị Nhà Hàng Hoàng Quyên tự tin và tự hào nhất. Hoàng Quyên sở hữu một đội ngũ nhân viên giàu kinh nghiệm và đã qua đào tạo chuyên sâu, bao gồm các chuyên gia tư vấn về ẩm thực, đầu bếp, nhân viên phục vụ… Tập thể nhân viên Hoàng Quyên luôn sẵn sàng cống hiến hết mình để có thể cung cấp những dịch vụ tốt nhất, chuyên nghiệp nhất đến khách hàng.</p>
						<h3>Hoạt động</h3>
						<p>Nhà hàng cung cấp đa dạng và phong phú các món ăn đặc trưng trong văn hóa ẩm thực Việt Nam cũng như thế giới. Thế mạnh của Nhà hàng là những món ăn được chế biến từ nguyên liệu được các tuyển trạch viên chọn lựa kĩ càng qua nhiều công đoạn với nhiều quy trình gắt gao. Với bàn tay tài hoa của đội ngũ đầu bếp giàu kinh nghiệm, khi đến Nhà Hàng chúng tôi, khách hàng sẽ được thưởng thức những món ăn đầy đủ sắc – hương – vị và mang tính đặc trưng chỉ có tại Website.</p>
						<div class="hover8">
							<div class="hover_img">
								<img src="assets/images/introduce1.jpeg" class="img-responsive" id="img_center">
							</div>
						</div>
						<h3>Kết!</h3>
						<p>Nào như vậy thì bạn còn chần chừ gì nữa hãy đến với Nhà hàng để tìm cho mình sản phẩm mà mình mong muốn nhất và chỉ cần một cú click chuột đơn giản đơn giản sẽ được giao đến bạn sớm nhất.Hãy tận hưởng tinh hoa ẩm thực ngay thôi! </p>
						
					</div>

				</div>
			</div>
		</div>
	</section>
@stop