<?php
require 'connect.php';
$id=$_GET["id"];
$detailtravel = $_GET["detailtravel"];
 
$querysearch	=" 	SELECT id, name, cp,
					ST_X(ST_Centroid(geom)) AS longitude, 
					ST_Y(ST_CENTROID(geom)) As latitude
					FROM travel where id='$detailtravel'
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $cp=$row['cp'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id'=>$id,'name'=>$name, 'cp'=>$cp,'longitude'=>$longitude,'latitude'=>$latitude);  
	}
echo json_encode ($dataarray);
?>