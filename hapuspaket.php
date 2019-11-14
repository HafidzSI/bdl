<?php
  include 'connect.php';
    if(isset($_GET['id']))
  {

  $idd=$_GET["id"];

$sql1 = "DELETE from info where id_package = '$idd'";
$sql2 = "DELETE from review where id_package = '$idd'";
$sql3 = "DELETE from detail_booking where id_package ='$idd'";
$sql4 = "DELETE from object_point where id_package='$idd'";
$sql5 = "DELETE from package where id='$idd'";

 // echo "booking=$ids, x=$id, s=$idd,  ";


  // $sql=$conn->query("DELETE from objek_point where id_package='$id'");
  // $sql2=$conn->query("DELETE from package where id='$id'");
  
  //$sql1=$conn->query("DELETE from detail_culinary_place where id_culinary_place='$id_culinary_place'");
  // $sql2=("DELETE from culinary_place where id='$id'");

  if($conn->query($sql5))
  {
      echo"<script>alert ('Data Has Been Deleted');</script>";
      //header("location:../admin");
    }else
    {
      echo"<script>alert ('Unsuccess to Delete Data!');</script>";
    }
  }
  echo "<script>document.location='paket.php'</script>";
?>

