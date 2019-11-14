<?php
include ('connect.php');

$username = $_POST['username'];
$date = $_POST['date'];
$total = $_POST['total'];
$totalprice = $_POST['totalprice'];
$id_package = $_POST['id_package'];
$id_booking = $_POST['id_booking'];

// $variabel_cari = $date."".$id_booking."".$id_package;


$text = "insert into booking (username, id_booking, date) values ('$username', '$id_booking', '$date')";
// echo $text;
$text2 = "insert into detail_booking (id_booking, id_package, total, totalprice) values ('$id_booking','$id_package', '$total', '$totalprice')";

$sql = $conn->query($text);
$sql2= $conn->query($text2);
 if ($sql)
 {
 	if($sql2)
 	{
 	echo"<script>
        alert ('Data Added!');
        eval(\"parent.location='indexes.php'\");
        </script>";
    }
 }
 
 else 
 {
 	echo 'error';
 }
