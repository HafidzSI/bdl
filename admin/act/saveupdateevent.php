<?php
include '../inc/connect.php';
    //Ambil data dari form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $open = $_POST['open'];
    $close = $_POST['close'];
    $ticket = $_POST['ticket'];
    $geom = $_POST['geom'];
    $id_city = $_POST['id_city'];
    $id_event_type = $_POST['id_event_type'];
    $id_organizer = $_POST['id_organizer'];
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
	$query = $conn->query("UPDATE event SET name='$name', address='$address', date='$date', open='$open', close='$close', ticket=$ticket, id_city='$id_city', id_event_type='$id_event_type' id_organizer='$id_organizer', geom=ST_GeomFromText('$geom')  WHERE id='$id'");
    $result = $conn->query($query);
    if ($query) 
    {
        echo "berhasil"; 
    } else{
        echo "error";
    }
    // echo "<script>document.location='act/event.php'</script>";
?>


