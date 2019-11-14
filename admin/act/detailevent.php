<?php
require 'connect.php';
$detailevent = $_GET["detailevent"];
 
$querysearch	=" 	SELECT id, name, address, date, open, close, ticket,
					ST_X(ST_Centroid(geom)) AS longitude, 
					ST_Y(ST_CENTROID(geom)) As latitude
					FROM event where id='$detailevent'
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $date=$row['date'];
		  $open=$row['open'];
		  $close=$row['close'];
		  $ticket=$row['ticket'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'date'=>$date,'open'=>$open,'close'=>$close,'ticket'=>$ticket,'description'=>$description, 'longitude'=>$longitude,'latitude'=>$latitude);  
	}
echo json_encode ($dataarray);
?>