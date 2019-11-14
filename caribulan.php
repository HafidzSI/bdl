<?php
require 'connect.php';

$bulan = $_GET["bulan"];

$querysearch	="	SELECT 	id, name, 
							ST_X(ST_Centroid(geom)) AS lng, 
							ST_Y(ST_CENTROID(geom)) As lat 
							FROM event where date='$bulan'
				";
   
$hasil = $conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
