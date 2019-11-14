<?php
include"connect.php";
    //Ambil data dari form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $open = $_POST['open'];
    $close = $_POST['close'];
    $ticket = $_POST['ticket'];
    $description = $_POST['description'];
    $geom = $_POST['geom'];
    $id_city = $_POST['id_city'];
    // $jenis_gambar=$_FILES['image']['type'];
    // if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 500000)){
    //     $sourcename=$_FILES["image"]["name"];
    //     $name=$id_tempat_wisata.'_'.$sourcename;
    //     $filepath="image/".$name;
    //     move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
    // }
    // else if ($foto=='null' || $foto=='' || $foto==null)
    // {
    //     $foto = 'foto.jpg';
    // }

    //query UPDATE
	$query = $conn->query("UPDATE tourism SET name='$name', address='$address', open='$open', close='$close', ticket=$ticket, description='$description', id_city='$id_city', geom=ST_GeomFromText('$geom') WHERE id='$id'"); 
    echo $query;
    // $result = $conn->query($query);
    if ($query) 
    {
        echo "berhasil"; 
    } else{
        echo "error";
    }
    echo "<script>document.location='tempatwisata.php'</script>";
