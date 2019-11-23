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
 			<table>
 				<tr>
 					<td>STT</td>
 					<td>ID</td>
 					<td>ID khách hàng</td>
 					<td>Ngày đặt hàng</td>
 					<td>Hình thức thanh toán</td>
 					<td>Tổng tiền</td>
 					<td>Trạng thái</td>
 				</tr>
 					
 					<?php 
				$n=1;
				foreach($don as $don){
					echo "<tr>";
					echo "<td>$n</td>";
					echo '<td>'.$don->id.'</td>';
					echo '<td>'.$don->idcus.' </td>';
					echo '<td><a href="qldonhang?date='.$don->date.'">'.$don->date.'</a> </td>';
					echo '<td>'.$don->typepay.' </td>';
					echo '<td>'.$don->tongtien.' </td>';
					?>
					<td>
						<form method="GET" action="capnhat">
						<input type="hidden" name="id" value="<?php echo $don->id ?>">
						<select style="border: none;" name="status">
							<option <?php if ($don->status=='Đang xử lý') {
             				 # code...
             				echo "selected=selected";
            				} ?>>Đang xử lý</option>
            				<option <?php if ($don->status=='Đã xác nhận') {
              				# code...
             				echo "selected=selected";
            				} ?>>Đã xác nhận</option>
            				<option <?php if ($don->status=='Đang vận chuyển') {
              				# code...
             				echo "selected=selected";
            				} ?>>Đang vận chuyển</option>
            				<option <?php if ($don->status=='Đã giao hàng') {
              				# code...
             				echo "selected=selected";
            				} ?>>Đã giao hàng</option>
						</select>
						
					</td>
					<td><input type="submit" name="capnhat" value="Cập nhật"></td>
					</form>
					<?php
					echo '<td><a href="ctdonhang?id='.$don->id.'">Chi tiết</a></td>	';
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