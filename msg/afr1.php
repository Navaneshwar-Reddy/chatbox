<?php
session_start();
include 'db_connect.php';
$uid=$_SESSION['uid'];
$aid=$_SESSION['aid'];
$res=$conn->query("INSERT INTO friends(p1,p2) values('$uid','$aid')");
$res1=$conn->query("DELETE FROM request WHERE (sid='$aid' AND rid='$uid')");
$_SESSION['fsid']=-1;
header("location:afr.php");
?>