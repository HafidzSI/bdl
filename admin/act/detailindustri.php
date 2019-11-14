<?php
require 'connect.php';
$detailindustri = $_GET["detailindustri"];
 
$querysearch	=" 	SELECT id_industri, nama_industri,
					ST_X(ST_Centroid(geom)) AS longitude, 
					ST_Y(ST_CENTROID(geom)) As latitude
					FROM industri where id_industri='$detailindustri'
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id_industri=$row['id_industri'];
		  $nama_industri=$row['nama_industri'];
		  $lokasi=$row['lokasi'];
		  $jam_buka=$row['jam_buka'];
		  $jam_tutup=$row['jam_tutup'];
		  $fasilitas=$row['fasilitas'];
		  $keterangan=$row['keterangan'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id_industri'=>$id_industri,'nama_industri'=>$nama_industri,'lokasi'=>$lokasi,'jam_buka'=>$jam_buka,'jam_tutup'=>$jam_tutup,'fasilitas'=>$fasilitas,'keterangan'=>$keterangan,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>