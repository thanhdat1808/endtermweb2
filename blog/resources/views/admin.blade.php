
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
	
	<div>@include('shop.menuleft')</div> 
	
	<?php 

 	?>
	<div class="col-lg-9 content">
		<div class="row add">
			<a href="themsp"><button title="Thêm sản phẩm mới!"><i class="fa fa-plus"></i></button></a>
		</div>
		<hr>
		<div class="row list">
			<table style="width: 100%;">
				<tr class="title">
					<td>STT</td>
					<td>Id</td>
					<td>Tên</td>
					<td>Danh mục</td>
					<td>Nhà cung cấp</td>
					<td>Giá</td>
					<td>Số lượng</td>
					<td>Mô tả</td>
					<td>Ảnh</td>
				</tr>
				<?php 
				$n=1;
				foreach($pro as $pro){
					echo "<tr>";
					echo "<td>$n</td>";
					echo '<td>'.$pro->id.' </td>';
					echo '<td>'.$pro->ten.' </td>';
					echo '<td>'.$pro->danhmuc.' </td>';
					echo '<td>'.$pro->nhacungcap.' </td>';
					echo '<td>'.$pro->gia.' </td>';
					echo '<td>'.$pro->soluong.' </td>';
					echo '<td><textarea>'.$pro->mota.'</textarea></td>';
					echo '<td><img src= img/'.$pro->anh.'></td>';
					?>
					<td>
						<a href="edit?id=<?php echo $pro->id ?>"> <button class="fa fa-edit" 
						title="Chỉnh sửa"></button></a>
					</td>
					<td>	
						<a href="delete?id=<?php echo $pro->id ?>"><button class="fa fa-remove" title="Xóa"></button></a>
					</td>
					<?php
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

