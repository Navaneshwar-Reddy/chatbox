<?php
session_start();
include 'db_connect.php';
if(isset($_POST['friendsearch']))
{
	$fs=$_POST['friendsearch'];
	echo $_POST['friendsearch'];
	$res=$conn->query("SELECT id FROM user WHERE user_name='$fs'") or die($conn->error);
while($row=$res->fetch_assoc())
 {
 	$_SESSION['fsid']=$row['id'];
 	header("location:profile.php");
 }
} 
?>