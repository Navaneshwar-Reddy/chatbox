<?php
session_start();
include 'db_connect.php';
$imagename=$_FILES["myimage"]["name"]; 
$uid=1;
//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
//echo $imagetmp;
//Insert the image name and image content in image_table
//$insert_image="INSERT INTO user (my_image,imagename) VALUES ('$imagetmp','$imagename') WHERE id='$uid'";
$uid=$_SESSION['uid'];
$conn->query("UPDATE  user SET my_image='$imagetmp',imagename='$imagename' WHERE `id`= '$uid'") or die($conn->error);
echo "
<script type='text/javascript'>
	var r=alert('your profile pic has been uploaded');
	window.location.href='home.php';
</script> ";

//header('location:home.php');
?>