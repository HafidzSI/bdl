<?php
require 'connect.php';

$querysearch="Select jenis_tempat_wisata.id_jenis_tempat_wisata, 
					 jenis_tempat_wisata.jenis_tempat_wisata, 
					 
					 from jenis_tempat_wisata order by jenis_tempat_wisata ASC";
	
$result=$conn->query($querysearch);
while($rowjenis = mysqli_fetch_array($result))
    {
        $id_jenis_tempat_wisata=$rowjenis['id_jenis_tempat_wisata'];
        $jenis_tempat_wisata=$rowjenis['jenis_tempat_wisata'];
		
		$dataarray[]=array('id_jenis_tempat_wisata'=>$id_jenis_tempat_wisata,'jenis_tempat_wisata'=>$jenis_tempat_wisata);
    }
echo json_encode ($dataarray);
?>