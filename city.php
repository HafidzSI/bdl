<?php
require 'connect.php';
// include_once('geoPHP/geoPHP.inc');
// $querysearch="	SELECT row_to_json(fc) 
// 				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
// 				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(city.geom)::json As geometry , row_to_json((SELECT l 
// 				FROM (SELECT city.id, city.name,ST_X(ST_Centroid(city.geom)) AS lon, ST_Y(ST_CENTROID(city.geom)) As lat) As l )) As properties 
// 				FROM city As city  
// 				) As f ) As fc
// 			  ";

$querysearch="SELECT st_asgeojson(city.geom) as geom,id, city.name, ST_X(ST_centroid(city.geom)) 
as lon, ST_Y(ST_Centroid(city.geom)) as lat from city";

// $querybaru = "SELECT *,ST_AsWKB(geom) as wkb FROM city";
$hasil = $conn->query($querysearch);

if (!$hasil) {
	echo "error";
}

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
// $geojson = array(
// 	'type'	=> 'FeatureCollection',
// 	'features'	=> array()
// );

// while ($data = mysqli_fetch_array($hasil)) {
// 	$properties = $data;
// 	unset($properties['wkb']);
// 	unset($properties['geom']);

// 	$feature = array(
// 		'type'	=> 'Feature',
// 		'geometry'	=> json_decode(wkb_to_json($data['wkb'])),
// 		'properties' => $properties
// 	);


// 	array_push($geojson['features'], $feature);
// }

// header('Content-type: application/json');

// var_dump($geojson);

// echo $feature;
