<!DOCTYPE html>
<html>
<head>
	<title></title>
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
 					<td>Ngày</td>
 					<td>Doanh thu</td>
 				</tr>
 				
 					<?php 
				$n=1;
				foreach($revenue as $rev){
					echo "<tr>";
					echo "<td>$n</td>";
					echo '<td><a href="qldonhang?datepay='.$rev->datepay.'">'.$rev->datepay.'</a> </td>';
					echo '<td>'.number_format($total[$rev->datepay],0).' VND </td>';
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