<?php
  include 'connect.php';
    if(isset($_GET['id']))
    {
      
  $ids=$_GET["id_package"];
  $sql1 = "DELETE from booking where id_package='$ids'";

      $id=$_GET["id"];
      $sql="DELETE from travel where id= '$id' ";
      if($conn->query($sql))
      {
        echo"<script>alert ('Data Deleted!');</script>";  
      }
      else
      {
        echo"<script>alert ('Failed to Delete Data!');</script>";
      }
    }
  echo "<script>document.location='travel.php'</script>";
?>