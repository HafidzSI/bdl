<?php
  require 'connect.php';            
  $id_objek = $_GET['id_objek'];     
  $id_status = $_GET['id_status'];
  $serial_number = $_GET['serial_number'];     
  $id_travel = $_GET['id_travel'];       
  $price = $_GET['price'];       
  $name = $_GET['name'];       

$text2 = "select * package where id_travel='$id_travel'";
$hasil=$conn->query($text2);
$no=0;
while($data=mysqli_fetch_array($hasil))
	{
		$no++;
	}



/*
1 industri
2 mesjid
3 rm
4 tw
*/
  $text = "insert into package (id, id_travel, name, price) values ($id, '$id_travel', '$name', $price)";
//$sql = $conn->query($text);
  // $hasil = $conn->query($querysearch);
?>

