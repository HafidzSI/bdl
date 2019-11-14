<?php
require 'connect.php';

// $querysearch="	SELECT row_to_json(fc) 
// 				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
// 				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(travel.geom)::json As geometry , row_to_json((SELECT l 
// 				FROM (SELECT travel.name, ST_X(ST_Centroid(travel.geom)) AS lon, ST_Y(ST_CENTROID(travel.geom)) As lat) As l )) As properties 
// 				FROM travel As travel
// 				) As f ) As fc
// 			  ";

// $hasil=$conn->query($querysearch);
// while($data=mysqli_fetch_array($hasil))
// 	{
// 		$load=$data['row_to_json'];
// 	}
// 	echo $load;

$querysearch="SELECT st_asgeojson(travel.geom) as geom,id, travel.name, ST_X(ST_centroid(travel.geom)) 
as lon, ST_Y(ST_Centroid(travel.geom)) as lat from travel"; 

$hasil=mysqli_query($conn, $querysearch);

$result = array(
	'type'=> 'FeatureCollection',
	'features' => array()
);
while($data=mysqli_fetch_assoc($hasil)){
	$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($data['geom']),

		'properties' => array(
			'id' => $data['id'],
			'name' => $data['name'],

			'lat' =>$data['lat'],
			'lon' =>$data['lon']
		)
	);
		array_push($result['features'], $features);
}
echo json_encode($result);
?>