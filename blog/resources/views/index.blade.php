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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div>@include('shop.menu')</div>
<div class="view">
	<div class="row" style="margin-right:  0px; margin-left: 0px; text-align: center;width: 100%;justify-content: center;">

	@foreach($pros as $pro)

	<div class="col-lg-4 product">
		<a href="chitiet?id={{$pro->id}}">
			<img src="img/{{$pro->anh}} "><hr>
			<h3>{{$pro->ten}}</h3>

		</a>
		<h3>{{$pro->gia}} VND</h3>
		<a href="addcart?id={{$pro->id}}"><button style="border: 1px solid green;" onclick="alert('Đã thêm vào giỏ hàng')"><b><i class="fa fa-plus"></i> Thêm vào giỏ hàng</b></button></a>
		<a href="addcart?id={{$pro->id}}&local=cart"><button ><b style="margin-top: 0px;"><i class="fa fa-cart-plus"></i> Mua ngay</b></button></a>
		<hr>

</div>
@endforeach
	 {{ $pros->links() }}
<div class="owl-carousel owl-theme" style="margin-bottom: 20px;">
<?php
	for ($i=0; $i <3 ; $i++) { 
		# code...
	?>
    <div class="item"><a href="index?ten=iphone 11"><img src="https://cdn.tgdd.vn/Products/Images/42/210653/iphone-11-pro-max-256gb-green-400x460.png"
	 alt="HTML tutorial" style="width: auto;"></a></div>
	 <div class="item"><a href="index?ten=iphone x"><img src="https://cdn1.viettelstore.vn/images/Product/ProductImage/medium/1100345574.jpeg"
	 alt="HTML tutorial"style="width: auto;"></a></div>
	 <div class="item"><a href="index?ten=laptop MIS"><img src="https://cdn.fptshop.com.vn/Uploads/Originals/2019/7/29/637000093289504897_msi-gf63-9rcx-1.png"
	 alt="HTML tutorial"style="width: auto;"></a></div>
	 <div class="item"><a href="index?ten=ipad pro"><img src="https://www.did.ie/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/m/l/mlmn2b_a.jpg"
	 alt="HTML tutorial"style="width: auto;"></a></div>
	<?php
	}
	 ?>
</div>
<h1>Sản phẩm nổi bật</h1>
</div>
@include('shop.form')
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
    </script>