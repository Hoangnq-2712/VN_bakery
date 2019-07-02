@extends('frontend.master')
@section('content')

<section id="login">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
					<div class="register">
						<h4>Đăng nhập</h4>
						<form method="POST">
							<div class="form-group" data-validate = "Valid email is: a@b.c">
								<input type="text" class="form-control" id="email" name="User" placeholder="Tài khoản" required="required">
							</div>
							<div class="form-group" data-validate="Enter password">
								<input type="password" class="form-control" id="pw" name="pass" placeholder="Mật khẩu" required="required">
							</div>
							<div class="form-group text-center">
								<button class="btn btn-button">Đăng nhập</button>
							</div>
							<p class="text-center">Bạn chưa có tài khoản? <a href="register.html">Đăng kí</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>





@stop