<?php
include 'connect.php';
$id = $_GET['id'];
$querysearch	="SELECT id,name, price, id_travel
                        FROM package as a where upper(name) like upper('%$name%') order by id ASC";
			   
$hasil=$conn->query($querysearch);
while($baris = mysqli_fetch_array($hasil))
	{
		$id=$baris['id'];
        $name=$baris['name'];
        $price=$baris['price']; 
        $id_travel=$baris['id_travel'];
        
        $dataarray[]=array('id'=>$id,'name'=>$name,'price'=>$price,'id_travel'=>$id_travel);
    }
echo json_encode ($dataarray);
?>
