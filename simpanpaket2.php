<?php
  require 'connect.php';            
	$id_package = $_GET['data2'];

if($_GET['data1']==1){        
	//$id = $_GET['data2'];
	$id_travel = $_GET['data3'];      
	$name = $_GET['data4'];         
	$price = $_GET['data5'];  
	$id_package = $_GET['data2'];    
	$text = "insert into package (id, id_travel, name, price) values ('$id', '$id_travel', '$name', $price)";
	echo $text;
	$sql = $conn->query($text);
if ($sql){
 	echo "<script> alert (' Data Berhasil Ditambahkan');</script>";
 }
 else 
 {
 	echo 'error';
 }
  echo "<a href='gissurya.org/wisatasumbar'</a>";
}
