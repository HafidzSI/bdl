<?php
require 'connect.php';

// $querysearch="	SELECT row_to_json(fc) 
// 				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
// 				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(souvenir.geom)::json As geometry , row_to_json((SELECT l 
// 				FROM (SELECT souvenir.name, ST_X(ST_Centroid(souvenir.geom)) AS lon, ST_Y(ST_CENTROID(souvenir.geom)) As lat) As l )) As properties 
// 				FROM souvenir As souvenir  
// 				) As f ) As fc
// 			  ";

// $hasil=$conn->query($querysearch);
// while($data=mysqli_fetch_array($hasil))
// 	{
// 		$load=$data['row_to_json'];
// 	}
// 	echo $load;
$querysearch="SELECT st_asgeojson(souvenir.geom) as geom,id, souvenir.name, ST_X(ST_centroid(souvenir.geom)) 
as lon, ST_Y(ST_Centroid(souvenir.geom)) as lat from souvenir"; 

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