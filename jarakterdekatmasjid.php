<?php
require 'connect.php';

$id=$_GET['id'];
$querysearch = $conn->query("select id, name,
						ST_X(ST_Centroid(geom)) AS longitude, 
						ST_Y(ST_CENTROID(geom)) As latitude,
						ST_Distance_Sphere(workship_place.geom,
						(select geom from workship_place where id='$id')) as meter 
						from workship_place order by meter asc limit 2");

while ($row=mysqli_fetch_assoc($querysearch)) 
$data[]=$row;
echo $_GET['jsoncallback'].''.json_encode($data).'';

?>