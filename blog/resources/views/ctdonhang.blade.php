<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="styleshop.css">
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
if(session('role')=='admin'){
?>
<div class="row admin" style="margin-right: 0px;margin-left: 0px;">
	
		@include('shop.menuleft');
 	<div class="col-lg-9 content">
 		 	<div class="row customer">
              <?php 
              foreach($cus as $cus){
                  $name=$cus->name;
                  $address=$cus->address;
                  $phone=$cus->phone;
              }
              ?>
 		 		<table>
 		 			<tr>
 		 				<td><h3>Tên khách hàng:</h3></td>
 		 				<td><h3><?php echo $name; ?></h3></td>
 		 			</tr>
 		 			<tr>
 		 				<td><h3>Địa chỉ:</h3></td>
 		 				<td><h3><?php echo $address; ?></h3></td>
 		 			</tr>
 		 			<tr>
 		 				<td><h3>Số điện thoại:</h3></td>
 		 				<td><h3><?php echo $phone; ?></h3></td>
 		 			</tr>
 		 		</table>
 		 		<table>
 		 			<tr>
 		 				
 		 				<td>Tên sản phẩm</td>
 		 				<td>Giá</td>
 		 				<td>Số lượng</td>
 		 				<td>Thành tiền</td>
 		 			</tr>
 		 			<?php 
 		 			foreach($ct as $pro){
 		 				echo"<tr>";
						echo '<td>'.$pro->tensp.' </td>';
						echo '<td>'.number_format($pro->gia,0).' VND </td>';
						echo '<td>'.$pro->soluong.' </td>';
						echo '<td>'.number_format($pro->gia*$pro->soluong,0).' VND</td>';
 		 			}
 		 			 ?>
 		 		</table>
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