<?php
session_start();
include('connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// $regis = $_POST['regis'];

$username = $_POST['username'];
$password = md5(md5($_POST['password']));
$role = $_POST['role'];
$cp = $_POST['cp'];
$address = $_POST['address'];
$name = $_POST['name'];
$email = $_POST['email'];


$query = "insert into administrator ( username, password, cp, address, name, email) values ('" . $username . "','" . $password . "','" . $cp . "','" . $address . "','" . $name . "','" . $email . "')";

//echo "$username, $password,$cp,$address,$name,$email";

$cek = $conn->query($query);

$token = date("Ymdhi") . $username;
$_SESSION['token'] = $token;
$_SESSION['user'] = $username;
$homepage = file_get_contents("http:///mailtemplate.php?token=$token&user=$username");

if ($cek) {
  require 'PHPMailer/class.phpmailer.php';

  $mail = new PHPMailer(); // create a new object
  $mail->isSMTP();
  $mail->SMTPDebug = 2;
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;

  // But you can comment from here
  $mail->SMTPSecure = "tls";
  $mail->Port = 587;
  $mail->CharSet = "UTF-8";
  // To here. 'cause default secure is TLS.

  $mail->setFrom("widyaw1996@gmail.com", "SISTEM INFORMASI Bukittinggi Tourism");
  $mail->Username = "wisatasumbarsig@gmail.com";
  $mail->Password = "wisatasumbar2018";

  $mail->Subject = "SISTEM INFORMASI Bukittinggi Tourism";

  $mail->addAddress("$email", "$name");
  $mail->msgHTML("<!DOCTYPE html>
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
  <div id='container'>
    <div id='header'>
      <h2>EMAIL VERIFICATION BKT Tourism</h2>
    </div>
    <div id='badan'>
      <p>Click the link below to verify your account</p>
      <a href='/admin/pages/verifikasi.php?token=$token&user=$username'>Click on this link to confirm your email</a> <!-- EDIT UNTUK HOSTING -->
    </div>
    <div id='kaki'>
      <h3>end of discusion</h3>
    </div>
  </div>
</body>
</html>");


  if (!$mail->send()) {

    $mail->ErrorInfo;
  } else {
    header('location:/admin/clocalhostphp');
  }
} else {
  echo "gagal";
} 
    // if($cek)
    // {
    //   $_SESSION['admin']=true;
    //   header('Location:../admin');
    //   exit();
    //   header('Location:log.php?reg=true');
    // }
    // else{
    //   echo "gagal";
    // }
