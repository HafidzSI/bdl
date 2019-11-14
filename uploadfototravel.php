<?php 
	include ('connect.php');
	$id = $_POST['id'];
	$querysearch="select serial_number from travel_gallery where id_travel='$id' order by serial_number desc limit 1";
echo "$id";

	 $hasil=$conn->query($querysearch);
	 $serial_number = 1;
	 while($baris = mysqli_fetch_array($hasil))
	 {
	 	$angka = $baris['serial_number'] + 1;
	 	$serial_number = $angka;
	 }

	$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 5000000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$sourcename;
		$filepath="foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
		$sql = $conn->query("insert into travel_gallery values('$serial_number','$name','$id')");
		if($sql){
			header("<script>eval(\"document.location='detailtravel.php'\");</script>");
		}
	}

	else{
		echo "The Picture Isn't Valid!<br>";
		echo "Go Back To <a href='detailtravel.php&id=$id'></a>";
	}
