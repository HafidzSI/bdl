<?php 
include ('inc/connect.php');

		$sql = "select count(*) as hitung from tourism
				";
				$query = $conn->query($sql);
		
		if(mysqli_num_rows($query)>0){
			$data = mysqli_fetch_assoc($query);
			return $data;
		}
