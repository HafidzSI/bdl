<?php
require 'connect.php';
$detailrm = $_GET["detailmrm"];
 
$querysearch	=" 	SELECT id_rumah_makan, nama_rumah_makan,
					ST_X(ST_Centroid(geom)) AS longitude, 
					ST_Y(ST_CENTROID(geom)) As latitude
					FROM rumah_makan where id_rumah_makan='$detailrm'
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id_rumah_makan=$row['id_rumah_makan'];
		  $nama_rumah_makan=$row['nama_rumah_makan'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id_rumah_makan'=>$id_rumah_makan,'nama_rumah_makan'=>$nama_rumah_makan, 'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>