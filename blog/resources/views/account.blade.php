<!DOCTYPE html>
<html lang="en">
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
<div>@include('shop.menu');</div>   
<div class="row viewaccount"style="margin-right:  0px; margin-left: 0px; text-align: center;width: 100%;justify-content: center;">
<div class="col-lg-6 infocus">
<?php foreach($acc as $acc){ ?>
	<h1>Hồ sơ của tôi</h1>
	<form action="update" method="Get">
<table>
    <tr>
        <td><p>Tên </p></td>
        <td><input type="text" name="name" value="{{$acc->name}}"></td>
	</tr>
	<tr>
		<td><p>Số điện thoại </p></td>
		<td><input type="text" name="phone" value="{{$acc->phone}}"></td>
	</tr>
    <tr>
		<td><p>Email </p></td>
		<td><input type="email" name="email" value="{{$acc->email }}"></td>
	</tr>
	<tr>
		<td><p>Địa chỉ </p></td>
		<td><input type="text" name="add" value="{{$acc->address}}"></td>
	</tr>
		<tr>
		<td><p>Giới tính </p></td>
		<td>
		<select name="gender">
			<option <?php if ($acc->gender=='Nam') {
            echo "selected=selected";
            } ?>>Nam</option>
			<option <?php if ($acc->gender=='Nữ') {
            echo "selected=selected";
            } ?>>Nữ</option>
			<option <?php if ($acc->gender=='Khác') {
            echo "selected=selected";
            } ?>>Khác</option>
			</select>
		</td>
		</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Cập nhật"></td>
	</tr>
</table>
</form>
<hr>
<form action="update" method="GET" name="f1" onsubmit="return check()">
	<h1>Tài khoản của tôi</h1>
	<table>
		<input type="hidden" value="{{$acc->password}}" name="oldpass">
	<tr>
		<td>Tên đăng nhập</td>
		<td><input type="text" name="user" value={{$acc->username}}></td>
	</tr>
	<tr>
		<td>Mật khẩu cũ</td>
		<td><input type="password" name="oldpass1"></td>
	</tr>
	<tr>
		<td>Mật khẩu mới</td>
		<td><input type="password" name="newpass"></td>
	</tr>
	<tr>
		<td>Nhập lại mật khẩu mới</td>
		<td><input type="password" name="newpass2"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Cập nhật"></td>
	</tr>
	</table>
</form>
<hr>
<h1>Đơn hàng của tôi</h1>
		<?php }?>

</div>
</div>
@include('shop.form')
</body>
</html>
<script>
function check(){  
var password=document.f1.oldpass.value;
var oldpassword=document.f1.oldpass1.value;
var firstpassword=document.f1.newpass.value;  
var secondpassword=document.f1.newpass2.value;  
if (password==oldpassword) { 
if(firstpassword==secondpassword){  
return true;  
}  
else{  
alert("Mật khẩu mới không khớp, vui lòng kiểm tra!");  
return false;  
}
} 
else{
alert("Mật khẩu cũ không đúng, vui lòng kiểm tra!");  
return false;	
} 
}  
</script>