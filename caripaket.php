<?php
	require 'connect.php';
	$name = $_GET['name'];
	$querysearch	=" 	SELECT id,name, price, id_travel
						FROM package as a where upper(name) like upper('%$name%') order by id ASC
					";

	$hasil=$conn->query($querysearch);
	while($row = mysqli_fetch_array($hasil))
		{
			  $id=$row['id'];
			  $id_travel=$row['id_travel'];
			  $name=$row['name'];
			  $price=$row['price'];
			  $dataarray[]=array('id'=>$id,'id_travel'=>$id_travel,'name'=>$name,'price'=>$price);  
		}
	echo json_encode ($dataarray);
?>
