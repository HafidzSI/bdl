<?php
include"../inc/connect.php";


    //Ambil data dari form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $open = $_POST['open'];
    $close = $_POST['close'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    // $id_city = $_POST['id_city'];
    $geom = $_POST['geom'];
    // $jenis_gambar=$_FILES['image']['type'];
    // if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
    //     $sourcename=$_FILES["image"]["name"];
    //     $name=$id_rumah_makan.'_'.$sourcename;
    //     $filepath="image/".$name;
    //     move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
    // }
    // else if ($foto=='null' || $foto=='' || $foto==null)
    // {
    //     $foto = 'foto.jpg';
    // }

    //query UPDATE
	$query = "UPDATE restaurant SET 
    name='$name', 
    address='$address', 
    open='$open', 
    close='$close', 
    price=$price,  
    description='$description', 
    
    geom=ST_GeomFromText('$geom') WHERE id='$id'";
    // echo "query";
    $result = $conn->query($query);
     if ($query) 
    {
        echo"<script>
        alert ('Data Updated!');
        eval(\"parent.location='../?page=detailrm&id=$id'\");
        </script>";
    } else{
        echo "error";
    }
    

?>