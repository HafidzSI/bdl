<?php
require 'connect.php';
$detailtype = $_GET["detailtype"];
 
$querysearch	=" 	SELECT id, name, address, open, close, ticket, description,
					ST_X(ST_Centroid(geom)) AS longitude, 
					ST_Y(ST_CENTROID(geom)) As latitude
					FROM tourism where id='$detailtype'
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $open=$row['open'];
		  $close=$row['close'];
		  $ticket=$row['ticket'];
		  $description=$row['description'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'date'=>$date,'open'=>$open,'close'=>$close,'ticket'=>$ticket,'description'=>$description, 'longitude'=>$longitude,'latitude'=>$latitude);  
	}
echo json_encode ($dataarray);
