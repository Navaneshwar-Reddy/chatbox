<?php
require 'db_connect.php';
session_start();


$recepid=mysqli_real_escape_string($conn,$_SESSION["fid"]);
$senderid=$_SESSION["uid"];
if (isset($_POST["submit1"])) 
{
	//echo "string";
	$ms=mysqli_real_escape_string($conn,$_POST['msg']);
	
	$date=date("Y-m-d");
	$time=date("h:i:sa");
	$conn->query("INSERT INTO msgs (`sender`,`reciever`,`msg`,`dt`,`content`) VALUES ('$senderid','$recepid','$ms','$date',0); ") or die(mysqli_error($conn));
	header('Location:msg.php');
	
}
if (isset($_FILES["myimage"]["name"]))
{
	//echo "string";
	$date=date("Y-m-d");
	$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$conn->query("INSERT INTO msgs (`sender`,`reciever`,`dt`,`isfile`,`filename`,`content`) VALUES('$senderid','$recepid','$date',1,'$imagename','$imagetmp')") or die(mysqli_error($conn));
header('Location:msg.php');


}
?>