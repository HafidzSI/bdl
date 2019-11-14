<?php
  include ('../inc/connect.php');

      $id=$_GET['id'];
      $sql="DELETE from tourism where id= '$id' ";
      if($conn->query($sql))
      {
        echo"<script>
        alert ('Data Deleted!');
        eval(\"parent.location='../?page=tempatwisata'\");
        </script>"; 
      }
      else
      {
        echo"<script>alert ('Failed to Delete Data!');</script>";
      }
    
  
?>