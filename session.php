<?php
include('connect.php');
session_start();
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	//	$name = $_POST['name'];
	$pass = md5(md5($password));

	//$pass=$password;
	$sql = $conn->query("SELECT * FROM administrator WHERE upper(username)=upper('$username') and password='$pass'");
	$num = mysqli_num_rows($sql);
	$dt = mysqli_fetch_array($sql);
	if ($num == 1) {
		$_SESSION['username'] = $username;

		if ($dt['role'] == 'a') {
			$_SESSION['a'] = true;
			?><script language="JavaScript">
				document.location = 'admin/index.php'
			</script><?php
									echo "<script>alert (' hyyy');</script>";
								}

								if ($dt['role'] == 'b') {
									$sql = $conn->query("select max(username) as max from administrator where travel_id='$dt[travel_id]'");
									$dt2 = mysqli_fetch_assoc($sql);
									if ($dt['username'] != $dt2['max']) {
										echo "<script>
			alert ('Fill with correct data!');
			eval(\"parent.location='login.php '\");	
			</script>";
									}
									$_SESSION['b'] = true;
									$_SESSION['username'] = $dt['username'];
									$_SESSION['travel_id'] = $dt['travel_id'];
									$_SESSION['name'] = $dt['name'];
									$query = $conn->query("select * from travel where id='$dt[travel_id]'");
									$data = mysqli_fetch_assoc($query);
									//$_SESSION['username'] = $data['username'];
									?>
			<script language="JavaScript">
				document.location = 'index3.php'
			</script>
		<?php
				}

				if ($dt['role'] == 'c') {
					$_SESSION['c'] = true;
					$_SESSION['username'] = $dt['username'];
					// $_SESSION['id_travel']=$dt['id_travel'];
					$_SESSION['name'] = $dt['name'];
					$query = $conn->query("select * from administrator where username='$dt[username]'");
					$data = mysqli_fetch_assoc($query);
					$_SESSION['username'] = $data['username'];
					?>
			<script language="JavaScript">
				document.location = 'indexes.php'
			</script><?php
								}
							} else {
								echo "<script>
		alert (' Login Failed, Please Fill Your Username and Password Correctly !');
		eval(\"parent.location='login.php '\");	
		</script>";
							}
						}
						?>