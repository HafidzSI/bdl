<?php
include ('connect.php');

$id_info = $_GET['id_info'];
$id_package = $_POST['id_package'];
//echo "$id_info --> id_info";

	$sql1   = "delete from info where id_info = $id_info";
	$delete1 = $conn->query($sql1);
	if ($delete1){
		echo "<script>alert ('Data Successfully Delete');</script>";
	}
	else{
		echo "<script>alert ('Error');</script>";
	}
	
	echo "<script>eval(\"document.location='paket.php'\");</script>";
?>