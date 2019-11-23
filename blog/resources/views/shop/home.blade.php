<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="image.png" type="img\image.png"/>
    <title>Ghost.Store</title>
</head>
<body>
<div>

<?php @include('menu') ?>
<div class="view">
	<div class="row" style="margin-right:  0px; margin-left: 0px; text-align: center;width: 100%;justify-content: center;">
	<?php 
	$con = mysqli_connect("localhost","root","","shop");
	$sql="";
	if (@$_GET["ten"]) {
		# code...
		$sql="select * from sanpham where ten like '%".$_GET["ten"]."%'";
	}
	elseif (@$_GET["danhmuc"]) {
		# code...
		$sql="select * from sanpham where danhmuc like '%".$_GET["danhmuc"]."%'";
	}
	else $sql = "select * from sanpham";
		$kq=mysqli_query($con,$sql);
		if ($kq->num_rows>0) {
			# code...
		
		while ($row=mysqli_fetch_array($kq)) {
			# code...
	?>
	<div class="col-lg-4 product">
		<a href="chitiet.php?id=<?php echo$row["id"] ?>">
			<img src="<?php echo'img/'.$row["anh"] ?>"><hr>
			<h3><?php echo $row["ten"]; ?></h3>

		</a>
		<h3><?php echo $row["gia"] ?> VND</h3>
		<a href="addcart.php?id=<?php echo$row["id"] ?>"><button style="background:#00FF00" onclick="alert('Đã thêm vào giỏ hàng')"><b><i class="fa fa-plus"></i> Thêm vào giỏ hàng</b></button></a>
		<a href="thanhtoan.php"><button ><b style="margin-top: 0px;"><i class="fa fa-cart-plus"></i> Mua ngay</b></button></a>
		<hr>
	</div>
	<?php	
		}
	}
	else echo "<h1>Không có sản phẩm cần tìm!</h1>";
	 ?>
</div>
</div>
</body>
</html>