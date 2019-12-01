<!DOCTYPE html>
<html>
<head>
	<title>Ghost.Store</title>
	<link rel="shortcut icon" href="image.png" type="image/png"/>
	<link rel="stylesheet" type="text/css" href="styleshop.css">
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div>@include('shop.menu')</div>
<div class="signup">
	<div class="col-lg-6 content-signup">
	<div class="row">
		<div class="col-lg-4 title">
		<a href="dangky.php"><img src="https://signup.com/mobileweb/2.0/images/build/mobile-organizers.png" alt=""><h1>Đăng ký</h1></a>
	</div>
	<div class="col-lg-8">
	<form method="POST" action="addacc">
	@csrf
	<input type="text" name="name" id="a1" placeholder="Họ và tên" title="Điền tên của bạn!" required="">
	<input type="text" name="phone" placeholder="Số điện thoại" title="Số điện thoại của bạn!" required="">
	<input type="email"id="a1" name="email" placeholder="Email" title="Email của bạn!" required="">
	<input type="text" name="add" id="a1" placeholder="Địa chỉ" title="Địa chỉ của bạn!" required="">
	<select name="gender" id="">
		<option value="Nam">Nam</option>
		<option value="Nữ">Nữ</option>
		<option value="Khác">Khác</option>
	</select>
	<input type="text"id="a1" name="user" placeholder="Tên đăng nhập" 
	title="Chọn tên đăng nhập cho tài khoản của bạn!" required="">
	<input type="password" id="a1" name="pass" placeholder="Mật khẩu" title="Nhập mật khẩu cho tài khoản của bạn" 
	minlength="4" required="">
	<br><br>
	<input type="submit" name="dangky" value="Đăng ký" style="width: auto; border-radius: 10px; background:green;color: white">
	<input type="reset" value="Làm mới" style="height: 40px;width: auto; border-radius: 10px; margin-left: 10px;background:green;color: white">
	</form>
	</div>
	</div>
	

</div>	
</div>
@include('shop.form')
</body>
</html>