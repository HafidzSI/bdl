<?php
require 'connect.php';
$detailmasjid = $_GET["detailmasjid"];
 
$querysearch	=" 	SELECT id_masjid, nama_masjid,
					ST_X(ST_Centroid(geom)) AS longitude, 
					ST_Y(ST_CENTROID(geom)) As latitude
					FROM masjid where id_masjid='$detailmasjid'
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id_masjid=$row['id_masjid'];
		  $nama_masjid=$row['nama_masjid'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id_masjid'=>$id_masjid,'nama_masjid'=>$nama_masjid, 'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>