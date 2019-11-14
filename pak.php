<?php
include("connect.php");                  
  $id = $_GET['id'];
  $querysearch = "SELECT package.id, package.id_travel, package.name, package.price FROM package where id_travel = '".$_GET['id']."'";

  $hasil = $conn->query($querysearch);
  while($baris = mysqli_fetch_array($hasil))
  {
    $id = $baris['id'];
    $id_travel = $baris['id_travel'];
    $name = $baris['name'];
    $price = $baris['price'];
    $dataarray[]=array('id'=>$id,'id_travel'=>$id_travel,'name'=>$name,'price'=>$price);
  }
  echo json_encode($dataarray);
?>