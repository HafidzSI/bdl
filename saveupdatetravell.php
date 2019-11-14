<?php
include"connect.php";

 //Ambil data dari form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $fullname = $_POST['fullname'];
    $cp = $_POST['cp'];
    $geom = $_POST['geom'];
    $address = $_POST['address'];
    $website = $_POST['website'];
    $open = $_POST['open'];
    $close = $_POST['close'];
    $description = $_POST['description'];
    $email = $_POST['email'];
 
  //  echo "$name,$password,$close";
    //query UPDATE
   
    $query = $conn->query("UPDATE travel SET name='$name', cp='$cp', geom =ST_GeomFromText('$geom') , address='$address', website='$website', open='$open', close='$close', description='$description', email='$email', fullname='$fullname'
            WHERE id='$id'");
    
//echo $query;

            // $sql = $conn->query("UPDATE kost set nama_kost='$nama_kost', alamat='$alamat' , id_pemilik='$id_pemilik', geom=ST_GeomFromText('$geom') where id_kost=$id");
    // $result = $conn->query($query);
    if ( $query) 
    {
        echo"<script>
        alert ('Data Updated!');
        eval(\"document.location='agenupdateinfo.php'\");
        </script>";
    } else{
        echo "error";
    }
