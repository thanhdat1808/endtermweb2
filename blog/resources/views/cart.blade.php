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
<div class="view" style="margin-left: 0px; margin-right: 0px;">
<div class="row giohang">

@if (@count($cart)>0)

	<table class="col-lg-10 pagecart">
		<tr>
			<td></td>
			<td><b>Tên sản phẩm</b></td>
			<td><b>Nhà cung cấp</b></td>
			<td><b>Giá</b></td>
			<td><b>Số lượng</b></td>
			<td><b>Tổng tiền</b></td>
			<td></td>
		</tr>
<?php $t=0; ?>
 @foreach ($pro as $pro)

 	<form method="GET" action="editcart">	
 	
		<tr></tr>
		<input type="hidden" name="id" value="{{$pro->id}}">
		<td><img src= "img/{{$pro->anh}}"></td>
		<td>{{$pro->ten}}</td>
		<td>{{$pro->nhacungcap}}</td>
		<td>{{number_format($pro->gia,0)}}VND</td>
		<td>
		<button onclick="tru({{$pro->id}})"><b>-</b></button>
		<input type="text" name="total" id="number{{$pro->id}}" value="{{$cart[$pro->id]}}" min="0" max="{{$pro->soluong}}" required> 
		<button onclick="cong({{$pro->id}})"><b>+</b></button>
		</td>
		<td>{{number_format($pro->gia*$cart[$pro->id],0)}} VND</td>
	
		<td>
			<button class="fa fa-upload" type="submit" title="Lưu"></button>
		</td>
		</form>
		<td><a href="deletecart?id=<?php echo$pro->id ?>&total=0"><button class="fa fa-remove" title="Xóa"></button></a></td>
		<tr></tr>
		<?php 
		$d=$pro->gia*$cart[$pro->id];
		$t=$t+$d;
		?>
@endforeach		
	<tr>
		<td><h2>Tổng số tiền là:</h2></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><b>{{number_format($t,0)}} VND</b></td>
		
	</tr>
	</table>
	@else<h3>Không có sản phẩm nào trong giỏ hàng, <a href="index">tiếp tục mua sắm!</a></h3>
	
	
	@endif
</div>
</div>
<?php if (@count($cart)>0) { ?>
<div class="button">
	<?php 
	if (session("id")) {
		# code...
	 ?>
	<a href="order"><button class="fa fa-cart-plus"> Mua hàng</button></a>
	<?php 
	}
	else{
	 ?>
	<button class="fa fa-cart-plus" data-toggle="modal" data-target="#myModalcart"> Mua hàng</button>
<?php }
	}
 ?>
</div>
@include('shop.form');
</body>
</html>
<script>
function cong(id){
	var n=document.getElementById("number"+id).value;
	document.getElementById("number"+id).value=parseInt(n)+1;
}
function tru(id){
	var n=document.getElementById("number"+id).value;
	if(n>1)document.getElementById("number"+id).value=parseInt(n)-1;
}
</script>