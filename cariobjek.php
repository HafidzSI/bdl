<?php
require 'connect.php';

$objek = $_GET["objek"];
$city = $_GET["city"];


if ($objek == '1') {
    $querysearch = "select a.id, a.name, st_x(st_centroid(a.geom)) as lon,st_y(st_centroid(a.geom)) as lat  from souvenir a, city  where st_contains(city.geom, a.geom) and city.id='$city'";

    // $querysearch = "select souvenir.id, souvenir.name, souvenir.id_city from souvenir join city on city.id = souvenir.id_city where souvenir.id_city='$city'";

    $result = $conn->query($querysearch);
    while ($row = mysqli_fetch_array($result)) {
        $id_city = $row['id_city'];
        $id = $row['id'];
        $name = $row['name'];
        $dataarray[] = array('id' => $id, 'id_city' => $id_city, 'name' => $name);
    }
    echo json_encode($dataarray);
} else if ($objek == '2') {
    $querysearch1 = "select a.id, a.name, st_x(st_centroid(a.geom)) as lon,st_y(st_centroid(a.geom)) as lat  from workship_place a, city  where st_contains(city.geom, a.geom) and city.id='$city'";
    // $querysearch1 = "select workship_place.id, workship_place.name, workship_place.id_city from workship_place join city on city.id = workship_place.id_city where workship_place.id_city='$city'";

    $result = $conn->query($querysearch1);
    while ($row = mysqli_fetch_array($result)) {
        $id_city = $row['id_city'];
        $id = $row['id'];
        $name = $row['name'];
        $dataarray1[] = array('id' => $id, 'id_city' => $id_city, 'name' => $name);
    }
    echo json_encode($dataarray1);
} else if ($objek == '3') {
    $querysearch2 = "select a.id, a.name, st_x(st_centroid(a.geom)) as lon,st_y(st_centroid(a.geom)) as lat  from restaurant a, city  where st_contains(city.geom, a.geom) and city.id='$city'";
    // $querysearch2 = "select restaurant.id, restaurant.name, restaurant.id_city from restaurant join city on city.id = restaurant.id_city where restaurant.id_city='$city'";

    $result = $conn->query($querysearch2);
    while ($row = mysqli_fetch_array($result)) {
        $id_city = $row['id_city'];
        $id = $row['id'];
        $name = $row['name'];
        $dataarray2[] = array('id' => $id, 'id_city' => $id_city, 'name' => $name);
    }
    echo json_encode($dataarray2);
} else {
    $querysearch3 = "select a.id, a.name, st_x(st_centroid(a.geom)) as lon,st_y(st_centroid(a.geom)) as lat  from tourism a, city  where st_contains(city.geom, a.geom) and city.id='$city'";
    // $querysearch3 = "select tourism.id, tourism.name, tourism.id_city from tourism join city on city.id = tourism.id_city where tourism.id_city='$city'";

    $result = $conn->query($querysearch3);
    while ($row = mysqli_fetch_array($result)) {
        $id_city = $row['id_city'];
        $id = $row['id'];
        $name = $row['name'];
        $dataarray3[] = array('id' => $id, 'id_city' => $id_city, 'name' => $name);
    }
    echo json_encode($dataarray3);
}
