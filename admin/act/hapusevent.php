<?php
  include ('connect.php');
    
      $id=$_GET['id'];
      $sql="DELETE from event where id= '$id' ";
      if($conn->query($sql))
      {
        echo"<script>alert ('Data Deleted!');</script>";  
      }
      else
      {
        echo"<script>alert ('Failed to Delete Data!');</script>";
      }
    
  echo "<script>document.location='?pages=event.php'</script>";
?>