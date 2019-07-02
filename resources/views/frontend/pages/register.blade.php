@extends('frontend.master')
@section('content')

	<section id="login">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="register">
						<h4>Đăng kí</h4>
						
						<form  action="" method="post" role="form" name="formdangky"  enctype="multipart/form-data">
							<div class="">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<h5>Họ và tên</h5>
											<input type="text" class="form-control" id="names" name="name" placeholder="Họ và tên" required="required">
										</div>
										<div class="form-group">
											<h5>Địa chỉ</h5>
											<input type="text" class="form-control" id="dichinh" name="diachinh" placeholder="Địa chỉ" required="required">
										</div>
										<div class="form-group">
											<h5>Điện thoại</h5>
											<input type="text" class="form-control" id="phome" name="phone" placeholder="Điện thoại" required="required">
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6" >
													<h5>Ngày sinh</h5>
													<input type="date" class="form-control" id="date" name="date" placeholder="Ngày sinh" required="required">
												</div>
												<div class="col-md-6">
													<h5>Giới tính </h5>
													<select name="sex" id="sex" class="form-control" required="required"> 
														<option value="0">Nam</option>
														<option value="1">Nữ</option> 
													</select>
												</div>
											</div>

										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<h5>Email</h5>
											<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
										</div>
										<div class="form-group">
											<h5>Tên đăng nhập</h5>
											<input type="text" class="form-control users" id="user" name="user" placeholder="Tên đăng Nhập" required="required">
										</div>
										<div class="form-group">
											<h5>Mật khẩu</h5>
											<input type="password" class="form-control" id="pw" name="pw" placeholder="*****" required="required">
										</div>
										<div class="form-group">
											<h5>Nhập lại Mật khẩu</h5>
											<input type="password" class="form-control" id="pw1" name="pw1" placeholder="*****" required="required">
										</div>
									</div>
								</div>
							</div>
							
							
							<div class="form-group text-center">
								<!-- <button >Đăng kí</button>  -->
								<input type="submit" name="Submit" class="btn btn-button add_users" value="Đăng kí "  onclick="return dangky()"/> 
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<script type="text/javascript">  

	var today = new Date().toISOString().split('T')[0];
	document.getElementsByName("date")[0].setAttribute('max', today);
	var reg_phome = /^(01[2689]|02[0-9]|09|08)[0-9]{8}/;
	var reg_mane = /^[áàảạãăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệiíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹđĐA-Za-z _]{3,24}$/;
	var reg_password = /^[a-z0-9A-Z]{6,20}/;
	var reg_dichinh = /^[áàảạãăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệiíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹđĐa-z0-9A-Z -]{5,50}/;
	var reg_user = /^[a-z0-9A-Z@._]{6,50}/;
	var reg_email =  /[a-z0-9A-Z._-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
	function dangky(){
		var f = document.forms['formdangky'];
		var names = f.names;
		var email = f.email;
		var phome = f.phome;
		var dichinh = f.dichinh;
		var pw = f.pw;
		var pa = f.pw.value;
		var pa1 = f.pw1.value;
		var user =  f.user.value;
		var date = f.date;
		
		if(!reg_mane.test (f.names.value)){
			alert("bạn Nhập sai tên");
			return false;
		}
		if (!reg_dichinh.test (f.dichinh.value)) {
			alert("bạn Nhập sai địa chỉ");
			return false;
		}
		if (!reg_phome.test (f.phome.value)) {
			alert("bạn Nhập sai số điện thoại");
			return false;
		}
		if (!reg_email.test (f.email.value)) {
			alert("bạn Nhập sai email");
			return false;
		}
		if (!reg_user.test (f.user.value)) {
			alert("Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác");
			return false;
		}
		if (!reg_password.test (f.pw.value)) {
			alert("yêu cầu bạn Nhập mật khẩu");
			return false;
		}
		if (pa != pa1) {
			alert("bạn xác nhận sai  mật khẩu");
			return false;

		}else{
			
			
			$.ajax({
				url:'handle_register.html',
				type:'POST',
				dataType:'json',
				data:{
					name:$('#names').val(),
					phone:$('#phome').val(),
					diachinh:$('#dichinh').val(),
					date:$('#date').val(),
					sex:$('#sex').val(),
					email:$('#email').val(),
					user:$('#user').val(),
					pw:$('#pw').val()
				},
				success:function(res) {
					console.log(res);
					alert (res.mesg);
				}
			});
			

			
			// 
		}
	}

	
</script> 

@stop