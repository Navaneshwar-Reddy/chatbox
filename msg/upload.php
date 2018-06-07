<?php55

$host = 'localhost';
$user = 'root';
$pass = '';
$db='demo';
$conn=mysqli_connect($host, $user, $pass,$db);

$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO image_table VALUES('$imagetmp','$imagename')";

mysqli_query($conn,$insert_image);

?>