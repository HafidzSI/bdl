<?php
require 'connect.php';

$name = $_GET["name"];
 
$querysearch	=" 	SELECT id,name,
					ST_X(ST_Centroid(geom)) AS longitude, 
					ST_Y(ST_CENTROID(geom)) As latitude
					FROM tourism as a where upper(name) like upper('%$name%') order by id ASC
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id'=>$id,'name'=>$name, 'longitude'=>$longitude,'latitude'=>$latitude);  
	}
echo json_encode ($dataarray);
?>