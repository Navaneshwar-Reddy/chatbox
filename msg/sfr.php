<?php
session_start();
include 'db_connect.php';
$sid=$_SESSION['uid'];
$rid=$_SESSION['fsid'];
$res=$conn->query("INSERT INTO request(sid,rid) VALUES ('$sid','$rid')");
$_SESSION['fsid']=-1;
header("location:profile.php");
?>