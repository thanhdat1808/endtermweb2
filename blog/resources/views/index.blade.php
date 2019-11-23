<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ghost.Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/image.png" type="image/png"/>
    <link rel="stylesheet" type="text/css" href="styleshop.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>
<div>@include('shop.menu')</div>
<div class="view">
	<div class="row" style="margin-right:  0px; margin-left: 0px; text-align: center;width: 100%;justify-content: center;">
	<?php 
	foreach($pro as $pro){
		$id=$pro->id;
		$name=$pro->ten;
		$img=$pro->anh;
		$price=$pro->gia;
	
	?>
	<div class="col-lg-4 product">
		<a href="chitiet?id=<?php echo$id ?>">
			<img src="<?php echo'img/'.$img ?>"><hr>
			<h3><?php echo $name; ?></h3>

		</a>
		<h3><?php echo $price ?> VND</h3>
		<a href="addcart?id=<?php echo$id ?>"><button style="border: 1px solid green;" onclick="alert('Đã thêm vào giỏ hàng')"><b><i class="fa fa-plus"></i> Thêm vào giỏ hàng</b></button></a>
		<a href="thanhtoan"><button ><b style="margin-top: 0px;"><i class="fa fa-cart-plus"></i> Mua ngay</b></button></a>
		<hr>
	</div>
	<?php	
	}
	 ?>
</div>
@include('shop.form')
</body>
</html>
