<!DOCTYPE html>
<?php
session_start();
include 'db_connect.php';
$res=$conn->query("SELECT * FROM request WHERE rid=".$_SESSION['uid']."");
if($res->num_rows>0)
{
	while($row=$res->fetch_assoc())
	{
		$sid=$row['sid'];
		$res1=$conn->query("SELECT * FROM user WHERE id='$sid'") or die($conn->error);
		$row1=$res1->fetch_assoc();
		echo $row1['username'];
		$_SESSION['aid']=$row1['id'];
		echo "
		<form action='afr1.php' method='post'>
	    <input type='submit' value='ACCEPT' name='fr'>
        </form>

		";

	}
}
?>
