<div class="header">
	<div class="name">
		<div class="mobimenu"><button class="fa fa-list"></button></i></div>
		<a href="index.php"><img src="image.png">Ghost.Store</a>
		<div class="mobicart"><button class="fa fa-cart-plus"></button></div>
	</div>
	<div class="funtion">
		<div class="search">
			<form method="GET" action="index.php">
				<input type="text" name="ten" value="" placeholder="Tìm kiếm sản phẩm" required="">
				<button class="fa fa-search" type="submit"></button>
			</form>
		</div>
		
		<div class="cart">
			<li>
			<a href="cart.php"><i class="fa fa-cart-plus" title="Giỏ hàng"></i></a>
			</li>

		</div>

		<div class="account">
			<?php 
			if (@$_SESSION['id']) {
				# code...
				$con = mysqli_connect("localhost","root","","shop");
				$sql = 'select * from khachhang where id ='.$_SESSION["id"];
				$kq = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($kq);
				$name = $row["name"];
				
			 ?>
			 	<a href="account.php"><button class="login"><i class="fa fa-user"></i><?php echo "$name";  ?></button></a>
			 <form action="logout.php" method="GET">
			 	<input type="submit" name="logout" value="Đăng xuất">
			 </form>
			<?php }
			else{
			 ?>
			
			<button class="login" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> <b>Đăng nhập</b></button>
		<?php } ?>
		</div>
	</div>
	<div class="menu" style="margin-left: 0px; margin-right: 0px;">
	<ul>
		<li><a href="index.php?danhmuc=laptop"><i class="fa fa-laptop"></i>LAPTOP</a></li>
		<li><a href="index.php?danhmuc=Điện thoại"><i class="fa fa-mobile-phone"></i>ĐIỆN THOẠI</a></li>
		<li><a href="index.php?danhmuc=ipad"><i class="fa fa-tablet"></i>IPAD</a></li>
		<li><a href="index.php?danhmuc=laptop"><i class="fa fa-laptop"></i>LAPTOP</a></li>
		<li><a href="index.php?danhmuc=Điện thoại"><i class="fa fa-mobile-phone"></i>ĐIỆN THOẠI</a></li>
		<li><a href="index.php?danhmuc=ipad"><i class="fa fa-tablet"></i>IPAD</a></li>
		<div class="mobilist"><i class="fa fa-laptop"></i><span>LAPTOP</span></div>
		<div class="mobilist"><i class="fa fa-laptop"></i><span>LAPTOP</span></div>
		<div class="mobilist"><i class="fa fa-laptop"></i><span>LAPTOP</span></div>
		<div class="mobilist"><i class="fa fa-laptop"></i><span>LAPTOP</span></div>
		<div class="mobilist"><i class="fa fa-laptop"></i><span>LAPTOP</span></div>
		<div class="mobilist"><i class="fa fa-laptop"></i><span>LAPTOP</span></div>
		<div class="mobilist"><i class="fa fa-laptop"></i><span>LAPTOP</span></div>
		<div class="mobilist"><i class="fa fa-laptop"></i><span>LAPTOP</span></div>
	</ul>
</div>
</div>