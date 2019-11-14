<?php
require "connect.php";

// if(isset($_SESSION['travel_id']))

    //Ambil data dari form
    $id = $_POST['travel_id'];
     $password = md5(md5($_POST['password']));

    //query UPDATE
	$query = "UPDATE administrator SET password='$password'
            WHERE travel_id='$id'";
    $result = $conn->query($query);
    if ($query) 
    {
        echo"<script>
        alert ('Password Has Been Update!');
        eval(\"document.location='infoagen.php'\");
        </script>";
    } else{
        echo "error";
    }
    // echo "<script>document.location='changepassword.php'</script>";
