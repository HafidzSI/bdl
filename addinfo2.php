<?php 
session_start();
include 'connect.php';
$id = $_POST['id'];
$nama = $_SESSION['username'];
$info = $_POST['info'];
//$user = $_SESSION['username'];
//echo "ini id $id, ini user $user, ini info $info, $role,$nama";

$cariMax = "select max(id_info) as max from info";
$queryMax = $conn->query($cariMax);
$dataMax = mysqli_fetch_array($queryMax);

$id_info = 0;
if($dataMax['max'] == null)
{
	$id_info = 1;
}
 else
{
	$id_info = $dataMax['max'] + 1;
}

$tanggal = date("Y-m-d");


// $sql = "";

	$sql = "insert into info(username,id_package,info,tanggal,id_info) values('$nama','$id','$info','$tanggal','$id_info')";

$query_sql = $conn->query($sql);
if($query_sql)
{
	echo "<script>alert ('Data Successfully Added');</script>";
	if($_SESSION['b']===true)
	{
	echo "<script>
	eval(\"parent.location='detailpaket.php?id=$id'\");	
	</script>";	
	//header("location:../?detailpaket&id=$id");
	}
		else
	{
		echo "<script>alert ('Error');</script>";
	}
}
?>