<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "12345";
	$port = "5432";
	$dbname = "wisatasumbar";
	$conn = mysqli_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>