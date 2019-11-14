<?php
include ('connect.php');

//
//$no_urut = $_POST['no_urut'];
$username = $_POST['username'];
$date = $_POST['date'];

$total = $_POST['total'];
$totalprice = $_POST['totalprice'];
$id_booking = $_POST['id_booking'];

$id_package = $_POST['id_package'];

 // $variabel_cari = $date."".$id_booking."".$id_package;
    //query UPDATE
	$text = "UPDATE booking SET    date='$date'    
    WHERE id_booking='$id_booking'";
    // echo $query;

    $text2 = "UPDATE detail_booking SET total='$total',    
    totalprice='$totalprice'   
    WHERE id_booking='$id_booking'";

    
	$sql = $conn->query($text);
	$sql2= $conn->query($text2);

	 if ($sql)
	 {
	 

	 	if ($sql2)
	 	{
	 	echo"<script>
	        alert ('Update your packages successfully!');
	        eval(\"parent.location='mybooking.php'\");
	        </script>";
	    }

	 }
	 
	 else 
	 {
	 	echo 'error';
	 }
