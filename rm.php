<?php
include('connect.php');
$id = $_GET['id'];
$querysearch = "	SELECT row_to_json(fc) FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features FROM (SELECT 'Feature' As type , ST_AsGeoJSON(a.geom)::json As geometry , row_to_json((SELECT l FROM (SELECT id, name) As l )) As properties FROM restaurant As a where id='$id') As f ) As fc";

$hasil = $conn->query($querysearch);
while ($data = mysqli_fetch_array($hasil)) {
	$load = $data['row_to_json'];
}
echo $load;