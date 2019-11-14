<?php
include ('connect.php');

$edit = $conn->query("update administrator set role='c' where username='$_GET[user]'");

if($edit){
	header('location:https://gissurya.org/wisatasumbar/login.php');
}
