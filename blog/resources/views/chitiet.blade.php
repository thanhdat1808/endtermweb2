<?php 
session_start();
 ?>
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
<div>@include('shop.menu');</div>
<div class="view">
	<div class="row chitiet" style="margin-right:  0px; margin-left: 0px">
	<?php 
	foreach($pro as $pro){
		$id = $pro->id;
		$ten=$pro->ten;
		$danhmuc=$pro->danhmuc;
		$nhacungcap=$pro->nhacungcap;
		$gia = $pro->gia;
		$soluong=$pro->soluong;
		$mota = $pro->mota;
		$anh = $pro->anh;
	}
	 ?>
	 <div class="col-lg-4">
	 	<img src="img/<?php echo$anh ?>">
	 </div>
	 <div class="col-lg-8">
	 	<h1><?php echo $ten ?></h1><hr>
	 	<h2><?php echo $gia ?> VND</h2>
	 	<h4>Nhà cung cấp: <?php echo $nhacungcap ?></h4>
	 	<h4>Số lượng trong kho: <?php echo$soluong ?></h4><hr>
	 	
	 	<div class="row buttonct">
		<div class="col-lg-5">
			<a href="addcart?id=<?php echo$id ?>&local=chitiet"><button style="color: green" onclick="alert('Đã thêm vào giỏ hàng')"><i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng</button></a>
		</div>
		
		<div class="col-lg-5 buy">
			<a href="thanhtoan.php"><button style="background:red;border:none; color: white">Mua ngay</button></a>
		</div>
	</div>

	 </div>
	 <div class="" style="margin-left: 0px;margin-right: 0px;margin-top:20px;">
	 	<h2>Mô tả sản phẩm:</h2>
		 <br>
	 	<?php echo$mota ?>
	 </div>
</div>
</div>
@include('shop.form')
</body>
</html>
