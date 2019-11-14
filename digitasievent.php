<?php
require 'connect.php';

$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(event.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT event.name, ST_X(ST_Centroid(event.geom)) AS lon, ST_Y(ST_CENTROID(event.geom)) As lat) As l )) As properties 
				FROM event As event  
				) As f ) As fc
			  ";

$hasil=$conn->query($querysearch);
while($data=mysqli_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>