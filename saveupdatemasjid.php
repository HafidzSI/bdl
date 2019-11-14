<?php
include "connect.php";

if (isset($_POST['id'])) {
    //Ambil data dari form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $id_city = $_POST['id_city'];
    $geom = $_POST['geom'];

    //query UPDATE
    $query = "UPDATE workship_place SET name='$name', address='$address', id_city='$id_city', geom=ST_GeomFromText('$geom')
            WHERE id='$id'";
    $result = $conn->query($query);
    if ($query) {
        echo "berhasil";
    } else {
        echo "error";
    }
    echo "<script>document.location='masjid.php'</script>";
}
