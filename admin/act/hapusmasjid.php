<?php
  include ('../inc/connect.php');
   
      $id=$_GET['id'];
      $sql="DELETE from workship_place where id= '$id' ";
      if($conn->query($sql))
      {
        echo"<script>
        alert ('Data Deleted!');
        eval(\"parent.location='../?page=masjid'\");
        </script>"; 
      }
      else
      {
        echo"<script>alert ('Failed to Delete Data!');</script>";
      }
    
?>