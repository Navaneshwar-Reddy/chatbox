<?php
session_start();
include 'db_connect.php';
$fsid=$_SESSION['fsid'];
$uid=$_SESSION['uid'];
$res1=$conn->query("DELETE FROM request WHERE (sid='$uid' AND rid='$fsid')");
?>