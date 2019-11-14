<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
	<style>
		#container{
			width: 800px;
			margin: 0 auto;
			height: 100px;
		}
		#header{
			background-color: grey;
			color: white;
			text-align: center
		}
		#badan{
			font-family: arial;
		}
		#kaki{
			margin-top:10px;
			background-color: grey;
			color: white;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="header">
			<h2>EMAIL VERIFICATION Bukittinggi Tourism</h2>
		</div>
		<div id="badan">
			<p>klick link dibawah untuk verifikasi</p>
			<a href="https://gissurya.org/wisatasumbar/admin/pages/verifikasi.php?token=<?php echo $_GET['token']?>&user=<?php echo $_GET['user']?>">INI LINKNYA !!!</a>
		</div>
		<div id="kaki">
			<h3>end of discusion</h3>
		</div>
	</div>
</body>
</html>