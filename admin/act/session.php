<?php
include('../inc/connect.php');
session_start();
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = md5(md5($_POST['password']));
	$name = $_POST['name'];
	$pass = $password;
	//$pass=$password;
	$sql = $conn->query("SELECT * FROM administrator WHERE upper(username)=upper('$username') and password='$pass'");
	$num = mysqli_num_rows($sql);
	$dt = mysqli_fetch_array($sql);
	if ($num == 1) {
		$_SESSION['username'] = $username;

		if ($dt['role'] == 'a') {

			$_SESSION['a'] = true;
			?><script language="JavaScript">
				document.location = '../'
			</script><?php
									echo "<script>
		alert (' lalalala');	
		</script>";
								}

								if ($dt['role'] == 'b') {
									$sql = $conn->query("select max(id) from administrator where id_travel='$dt[id_travel]'");
									$dt2 = mysqli_fetch_assoc($sql);
									if ($dt['id'] != $dt2['max']) {
										echo "<script>
			alert (' Isi data dengan benar !');
			eval(\"parent.location='../login.php '\");	
			</script>";
									}
									$_SESSION['b'] = true;
									$_SESSION['username'] = $dt['username'];
									$_SESSION['id_travel'] = $dt['id_travel'];
									$_SESSION['name'] = $dt['name'];
									$query = $conn->query("select * from travel where id='$dt[id_travel]'");
									$data = mysqli_fetch_assoc($query);
									$_SESSION['id'] = $data['id'];
									?><script language="JavaScript">
				document.location = '../../index3.php'
			</script><?php
								}

								if ($dt['role'] == 'c') {
									$sql = $conn->query("select max(id) from administrator where id_tourist='$dt[id_tourist]'");
									$dt2 = mysqli_fetch_assoc($sql);
									if ($dt['id'] != $dt2['max']) {
										echo "<script>
			alert (' Isi data dengan benar !');
			eval(\"parent.location='../login.php '\");	
			</script>";
									}
									$_SESSION['c'] = true;
									$_SESSION['username'] = $dt['username'];
									$_SESSION['id_tourist'] = $dt['id'];
									$_SESSION['name'] = $dt['name'];
									$query = $conn->query("select * from tourist where id='$dt[id]'");
									$data = mysqli_fetch_assoc($query);
									$_SESSION['id'] = $data['id'];
									?><script language="JavaScript">
				document.location = '../../index3.php'
			</script><?php
								}
							} else {
								echo "<script>
		alert (' Login Failed, Please Fill Your Username and Password Correctly !');
		eval(\"parent.location='../login.php '\");	
		</script>";
							}
						}
						?>