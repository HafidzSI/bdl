<?php
include ('connect.php');

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$date = $_POST['date'];
$open = $_POST['open'];
$close = $_POST['close'];
$ticket = $_POST['ticket'];
$id_city = $_POST['id_city'];
$id_event_type = $_POST['id_event_type'];
$id_organizer = $_POST['id_organizer'];
$geom = $_POST['geom'];
$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id_rumah_makan.'_'.$sourcename;
		$filepath="image/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
	}
	else if ($foto=='null' || $foto=='' || $foto==null)
	{
		$foto = 'foto.jpg';
	}

$text = "insert into event (id, name, address,date, open, close, ticket, id_city, id_event_type, id_organizer foto, geom) values ($id, '$name', '$address', '$date' '$open', '$close', '$ticket', '$id_city', '$id_event_type', '$id_organizer', ST_GeomFromText('$geom')  )";
echo $text;

$sql = $conn->query($text);
 if ($sql){
 	echo "<script> alert (' Data Berhasil Ditambahkan');</script>";
 }
 else 
 {
 	echo 'error';
 }
  echo "<a href='gissurya.org/paketwisatahalal/event.php'</a>";
