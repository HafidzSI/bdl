<?php
require 'connect.php';
$id=$_GET['id'];
$querysearch="	SELECT tempat_wisata.id_tempat_wisata, tempat_wisata.nama_tempat_wisata, 
                        rumah_makan.id_rumah_makan, rumah_makan.nama_rumah_makan, 
                        masjid.id_masjid, masjid.nama_masjid,
                
                 ST_X(ST_Centroid(tempat_wisata.geom, rumah_makan.geom, masjid.geom)) AS lon, ST_Y(ST_CENTROID(tempat_wisata.geom, rumah_makan.geom, masjid.geom)) 
				As lat FROM tempat_wisata, rumah_makan, masjid";

$hasil=$conn->query($querysearch);
while($baris = mysqli_fetch_array($hasil))
	{
		$id_tempat_wisata=$baris['id_tempat_wisata'];
        $nama_tempat_wisata=$baris['nama_tempat_wisata'];

        $id_rumah_makan=$baris['id_rumah_makan'];
        $nama_rumah_makan=$baris['nama_rumah_makan'];

        $id_masjid=$baris['id_masjid'];
        $nama_masjid=$baris['nama_masjid'];

        
        $longitude=$baris['lon'];
		$latitude=$baris['lat'];

        $dataarray[]=array('id_tempat_wisata'=>$id_tempat_wisata,'nama_tempat_wisata'=>$nama_tempat_wisata,'id_rumah_makan'=>$id_rumah_makan, 'nama_rumah_makan'=>$nama_rumah_makan,'id_masjid'=>$id_masjid,'nama_masjid'=>$nama_masjid, 'lon'=>$longitude,'lat'=>$latitude);
    }
echo json_encode ($dataarray);
