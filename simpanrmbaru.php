<?php
include ('connect.php');

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$open = $_POST['open'];
$close = $_POST['close'];
$price = $_POST['price'];
// $fasilitas = $_POST['fasilitas'];
$description = $_POST['description'];
$id_city = $_POST['city'];
$geom = $_POST['geom'];
// $jenis_gambar=$_FILES['image']['type'];
// 	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
// 		$sourcename=$_FILES["image"]["name"];
// 		$name=$id_rumah_makan.'_'.$sourcename;
// 		$filepath="image/".$name;
// 		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
// 	}
// 	else if ($foto=='null' || $foto=='' || $foto==null)
// 	{
// 		$foto = 'foto.jpg';
// 	}

$text = "insert into restaurant (id, name, address, open, close, price, id_city, description, geom) values ('$id', '$name', '$address', '$open', '$close', $price, '$id_city', '$description', ST_GeomFromText('$geom')  )";
echo $text;

$sql = $conn->query($text);
 if ($sql){
 	echo "<script> alert (' Data Berhasil Ditambahkan');</script>";
 }
 else 
 {
 	echo 'error';
 }
  echo "<a href='gissurya.org/wisatasumbar/rumahmakan.php'</a>";
