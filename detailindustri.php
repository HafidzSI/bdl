<?php
require 'connect.php';
$id=$_GET["id"];
$detailsouvenir = $_GET["detailsouvenir"];
 
$querysearch	=" 	SELECT id, name, address, open, close, description,
					ST_X(ST_Centroid(geom)) AS longitude, 
					ST_Y(ST_CENTROID(geom)) As latitude
					FROM souvenir where id='$detailsouvenir'
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $open=$row['open'];
		  $close=$row['close'];
		  $description=$row['description'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'open'=>$open,'close'=>$close,'description'=>$description,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>