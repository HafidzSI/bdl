<?php
require 'connect.php';
$id=$_GET['id'];

$querysearch1="   SELECT travel.id, travel.name,
                 ST_X(ST_Centroid(travel.geom)) AS lon, ST_Y(ST_CENTROID(travel.geom)) 
                As lat FROM travel WHERE travel.id='$id'";

$hasil=$conn->query($querysearch1);
while($row = mysqli_fetch_array($hasil))
    {
        $id = $row['id'];
        $name=$row['name'];
        $longitude=$row['lon'];
        $latitude=$row['lat'];
        $dataarray[]=array('id'=>$id, 'name'=>$name, 'longitude'=>$longitude,'latitude'=>$latitude);
    }

echo json_encode($dataarray);
