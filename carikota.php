<?php
require 'connect.php';

$kota = $_GET["kota"];
 $querysearch="Select distinct id_tempat_wisata, 
 					 nama_tempat_wisata, id_kota, 
 					 st_x(st_centroid(geom)) as longitude,
 					 st_y(st_centroid(geom)) as latitude from 
 					 tempat_wisata where lower (id_kota) like 
 					 lower ('%$kota%')";
	
$result=$conn->query($querysearch);
while($row = mysqli_fetch_array($result))
    {
        $id_tempat_wisata=$row['id_tempat_wisata'];
        $nama_tempat_wisata=$row['nama_tempat_wisata'];
        $id_kota=$row['id_kota'];
		$longitude=$row['longitude'];
		$latitude=$row['latitude'];
		$dataarray[]=array('id_tempat_wisata'=>$id_tempat_wisata,'nama_tempat_wisata'=>$nama_tempat_wisata, 
							'id_kota'=>$id_kota, 'longitude'=>$longitude, 'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>