<?php

$host = "localhost";
$user = "postgres";
$pass = "root";
$port = "5432";
$dbname = "paketwisata";
$conn = mysqli_connect("host=" . $host . " port=" . $port . " dbname=" . $dbname . " user=" . $user . " password=" . $pass) or die("Gagal");

$query = 'SELECT st_astext(geom) from city';
$hasil = mysqli_query($query);

while ($row = mysqli_fetch_assoc($hasil)) {
    echo $row['geom'];
}
