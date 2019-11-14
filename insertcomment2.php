<?php 

include 'connect.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$comment = $_POST['comment'];

$cariMax = "select max(id_review) as max from review";
$queryMax = $conn->query($cariMax);
$dataMax = mysqli_fetch_array($queryMax);

$id_review = 0;
if($dataMax['max'] == null){
	$id_review = 1;
} else {
	$id_review = $dataMax['max'] + 1;
}

$tanggal = date("Y-m-d");

$sql = "";
//echo strpos($id,"RMasd");

	$sql = "insert into review(name,id_travel,comment,tanggal,id_review) values('$nama','$id','$comment','$tanggal','$id_review')";


$query_sql = $conn->query($sql);
if($query_sql){
	echo "<script>alert ('Data Successfully Added');</script>";
}else{
	echo "<script>alert ('Error');</script>";
}

echo "<script>
	eval(\"parent.location='gallery2.php?id_travel=$id'\");	
	</script>";

?>

