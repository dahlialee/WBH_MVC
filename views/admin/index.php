<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AUGUST for ADMIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
	<script src="public/jquery/jquery-latest.js"></script>
	<script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid" style="background-color: beige; text-align: center; margin-bottom: 20px">
		<img src="public/images/logo.png" width="200" height="200">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<legend>AUGUST for ADMIN</legend>
					<span><i id="err" style="color: red"></i></span>

					<div class="form-group">
						<label for="">Tên tài khoản</label>
						<input type="text" class="form-control" id="username">
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="text" class="form-control" id="password">
					</div>



					<span class="btn btn-success" onclick="login()">Đăng Nhập</span>
				</form>
			</div>
		</div>
	</div>
	<script>
		function login(){
			var username = $('#username').val();
			var password = $('#password').val();
			$.ajax({
				url : "indexadmin/login",
				type : "post",
				dataType:"text",
				data : {
					username, password
				},
				success : function (result){
					if(result == "LoginSuccess"){
						location.replace('http://localhost/WBH_MVC/indexadmin/dashboard');
					}
					$('#err').html(result);
				}
			});
		}
	</script>
</body>
</html>