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
<div> @include('shop.menu');</div>
<div class="view" style="margin-left: 0px; margin-right: 0px;">
	<div class="col-lg-7 info">
    <?php
    foreach($cus as $cus){
        $name=$cus->name;
        $add=$cus->address;
        $phone=$cus->phone;

    }
    ?>
		<table>
			<tr>
				<td><h3>Tên người nhận: </h3></td>
				<td></td>
				<td><h3><?php echo $name; ?></h3></td>
			</tr>
			<tr>
				<td><h3>Địa chỉ: </h3></td>
				<td></td>
				<td><h3><?php echo $add; ?></h3></td>
			</tr>
			<tr>
				<td><h3>Số điện thoại: </h3></td>
				<td></td>
				<td><h3><?php echo $phone; ?></h3></td>
			</tr>
			<tr>
				<td><h3>Phương thức thanh toán:</h3></td>
				<td></td>
				<td>
					<form method="GET" action="thanhtoan">
						<select name="typepay">
						<option>Thanh toán khi nhận hàng</option>
						<option>AriPay</option>
						<option>Thẻ tín dụng</option>
					</select>
					
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="" value="Xác nhận"></td>
				<td></td>
				</form>
			</tr>
		</table>
	</div>
<div class="col-lg-5 giohang">
	<table class="pagecart">	
<?php
$t=0;
 foreach ($pro as $pro){
        $cart=session('cart');
		echo"<tr>";
		echo '<input type="hidden" name="id" value="'.$pro->id.'">';
		echo '<td><img src= img/'.$pro->anh.' style="width:80px;"></td>';
		echo '<td>'.$pro->ten.' </td>';
		echo '<td>'.$pro->gia.'x </td>';
		echo '<td>'.$cart[$pro->id].'=</td>';
		echo '<td>'.$pro->gia*$cart[$pro->id].' VND</td>';
		echo "</tr>";
		$d=$pro->gia*$cart[$pro->id];
		$t=$t+$d;
	} 
	?>
	<tr>
		<h3>Tổng tiền:</h3>

	<h3><b><?php echo $t; ?> VND</b></h3>
		
	</tr>
	</table>
</div>
</div>
</body>
</html>