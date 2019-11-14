<?php
  require 'connect.php';            
  $id = $_GET['id'];  
  $name = $_GET['name'];
  $price = $_GET['price'];
  $id_travel = $_GET['id_travel'];   

/*
1 industri
2 mesjid
3 rm
4 tw
*/

  $querysearch = "INSERT into package (id, name, price, id_travel) values ('$id', '$name', '$price', '$id_travel')";

  $hasil = $conn->query($querysearch);
?>

