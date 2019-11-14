<?php
require 'connect.php';
$name = $_GET['name']; 
$querysearch	=" 	SELECT id, name
					FROM travel as a where upper(name) like upper('%$name%') order by id ASC
				";

$hasil=$conn->query($querysearch);
while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  // $price=$row['price'];
		  $dataarray[]=array('id'=>$id,'name'=>$name);  
	}
echo json_encode ($dataarray);
?>