<?php
include ('connect.php');
$id_tempat_wisata = $_POST['id_tempat_wisata'];
$nama_tempat_wisata = $_POST['nama_tempat_wisata'];
$lokasi = $_POST['lokasi'];
$jam_buka = $_POST['jam_buka'];
$jam_tutup = $_POST['jam_tutup'];
$biaya = $_POST['biaya'];
$fasilitas = $_POST['fasilitas'];
$keterangan = $_POST['keterangan'];
$geom = $_POST['geom'];

$sql = $conn->query("insert into tempat_wisata (id_tempat_wisata,nama_tempat_wisata, lokasi, jam_buka, jam_tutup, biaya, fasilitas, keterangan, geom) values ('$id_tempat_wisata', '$nama_tempat_wisata', '$lokasi', '$jam_buka', '$jam_tutup', '$biaya', '$fasilitas', '$keterangan', ST_GeomFromText('$geom'))");


if ($sql){
	
	echo "Success Create Data!<br>";
	// echo "Back to <a href='../'>Dashboard</a>";
}else{
	echo 'error';
}

?>