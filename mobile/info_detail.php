<?php
require 'connect.php';
$id = $_GET["id"];


$query1 = "SELECT serial_number,restaurant.name as n1, city.name as n2, time as n3 FROM object_point JOIN restaurant ON restaurant.id = object_point.id_restaurant JOIN city ON city.id = restaurant.id_city where id_package='$id' AND object_point.status = '3'";
$query2 = "SELECT serial_number,tourism.name as n1, city.name as n2, time as n3 FROM object_point JOIN tourism ON tourism.id = object_point.id_tourism JOIN city ON city.id = tourism.id_city where id_package='$id' AND object_point.status = '4'";
$query3 = "SELECT serial_number,souvenir.name as n1, city.name as n2, time as n3 FROM object_point JOIN souvenir ON souvenir.id = object_point.id_souvenir JOIN city ON city.id = souvenir.id_city where id_package='$id' AND object_point.status = '1'";
$query4 = "SELECT serial_number,workship_place.name as n1 , city.name as n2, time as n3 FROM object_point JOIN workship_place ON workship_place.id = object_point.id_workship_place JOIN city ON city.id = workship_place.id_city where id_package='$id' AND object_point.status = '2'";

$query = $query1." UNION ".$query2." UNION ".$query3." UNION ".$query4." ORDER BY serial_number";
$hasil=$conn->query($query);

$res = [];
while($row = mysqli_fetch_array($hasil)){
	array_push($res, [
		'n1'=>$row['n1'],
		'n2'=>$row['n2'],
		'n3'=>$row['n3']]);
}

echo json_encode($res);