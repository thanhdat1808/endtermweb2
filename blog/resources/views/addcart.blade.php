<?php 
session_start();
$con = mysqli_connect("localhost","root","","shop");
if (@$_GET["id"]) {
	# code...
	$id=$_GET["id"];
if (@($_SESSION["cart"][$id])) {
	# code...
	$_SESSION["cart"][$id]++;
}
else{
	
	$_SESSION["cart"][$id] = 1;
} 
}
if ($_GET["local"]=="chitiet") {
	# code...
	header('Location: chitiet.php?id='.$id);
}
else header('Location: index.php');
 ?>