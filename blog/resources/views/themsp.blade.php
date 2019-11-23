<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styleshop.css">
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>
<body>
<?php
if(session('role')=='admin'){
?>
<div class="row admin"style="margin-right: 0px;margin-left: 0px;">
	
		@include('shop.menuleft');
	<div class="col-lg-8 content">
		<div class="row addpro">
			<form method="GET" action="addpro">
				<table>
				<tr>
					<td><b>Tên sản phẩm</b></td>
					<td><input type="text" name="namepro" required=""></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<select name="danhmuc">
						<option>Điện thoại</option>
						<option>Laptop</option>
						<option>ipad</option>
					</select>
					</td>
				</tr>
				<tr>
					<td><b>Nhà cung cấp</b></td>
					<td><input type="text" name="provide" required=""></td>
				</tr>
				<tr>
					<td><b>Giá</b></td>
					<td><input type="number" name="price" required=""></td>
				</tr>
				<tr>
					<td><b>Số lượng</b></td>
					<td><input type="number" name="total" required=""></td>
				</tr>
				<tr>
					<td><b>Mô tả</b></td>
					<td><textarea class="mota" name="content" id="editor"></textarea></td>
				</tr>
				<tr>
					<td><b>Ảnh</b></td>
					<td><input type="file" name="img" style="padding-top: 5px;" required=""></td>
				</tr>
			</table>
			<div class="update">
			<input type="submit" name="save" value="Cập nhật">
			<input type="reset" name="" value="Làm mới">
			</div>
			</form>
		</div>
	</div>
</div>

<?php 
}
else{
	echo"Bạn không có quyền truy cập trang!";
?>
<br>
<a href="index">Quay lại trang chủ</a>
<?php
} 
 ?>
</body>
</html>
<script> CKEDITOR.replace('editor'); </script>