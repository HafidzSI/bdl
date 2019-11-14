<?php
include ('connect.php');
$regis = $_POST['regis'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

    $query = "insert into tourist (name,email,password) values('".$username."','".$email."','".$password."')";

    $cek = $conn->query($query);
    
    if($cek)
    {
      /*$_SESSION['admin']=true;
      header('Location:../admin');
      exit();*/
      header('Location:login.php?reg=true');
    }
    else{
      echo "gagal";
    }
?>