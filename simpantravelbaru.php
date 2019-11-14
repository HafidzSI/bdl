<?php
include ('connect.php');

$idbaru = $_POST['id'];
$namabaru = $_POST['name'];
$cpbaru = $_POST['cp'];

$text = "insert into travel (id, name, cp) values ('$idbaru', '$namabaru', '$cpbaru')";
echo $text;

$sql = $conn->query($text);
 
 if ($sql)
 {
 	echo "<script> alert (' Data Berhasil Ditambahkan');</script>";
 }
 else 
 {
 	echo 'error';
 }
echo "<a href='gissurya.org/wisatasumbar/travel.php'</a>";
