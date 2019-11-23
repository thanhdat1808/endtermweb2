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
     <div class="row cus">
         <div class="searchcus">
        <form action="khachhang" method="GET">
        <input type="text" name="name" placeholder="Tên khách hàng"required="">
        <button class="fa fa-search" type="submit"></button>
        </form>
     </div>
     </div>
 		 		<div class="row customer">
 			<table>
 				<tr>
 					<td>STT</td>
 					<td>ID</td>
 					<td>Tên</td>
 					<td>Số ĐT</td>
 					<td>Địa chỉ</td>
 					<td>Email</td>
 					<td>User</td>
 					<td>PassWord</td>
 					<td>Số lượng đơn hàng</td>
 				</tr>
 				
                     <?php 
                     
				$n=1;
				foreach($cus as $cus ){
                        $id=$cus->id;
                        $name=$cus->name;
                        $phone=$cus->phone;
                        $address=$cus->address;
                        $email=$cus->email;
                        $username=$cus->username;
                        $password=$cus->password;
                        
                        
					echo "<tr>";
					echo "<td>$n</td>";
					echo '<td>'.$id.' </td>';
					echo '<td>'.$name.' </td>';
					echo '<td>'.$phone.' </td>';
					echo '<td>'.$address.' </td>';
					echo '<td>'.$email.' </td>';
					echo '<td>'.$username.' </td>';
					echo '<td>'.$password.'</td>';
					echo '<td>'.$total[$id].'</td>';
                    echo "</tr>";
                    $n++;
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