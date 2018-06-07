<?php
require 'db_connect.php';


if($_SERVER['REQUEST_METHOD']=='POST'){

if(isset($_POST["submit"])){
	//echo "string";
$first_name=mysqli_real_escape_string($conn,$_POST['fname']);
$last_name=mysqli_real_escape_string($conn,$_POST['lname']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$password=mysqli_real_escape_string($conn,password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash=mysqli_real_escape_string( $conn,md5( rand(0,1000) ) );
$username=$first_name;
if($gender == 'Male')
{
	$gender=1;

}
else
{
	$gender=0;
}
$result = $conn->query("SELECT * FROM user WHERE email='$email'") or die(mysqli_error($conn));

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
   echo 'User with this email already exists!';
    //header("success.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
   $conn->query("INSERT INTO user (`first_name`,`last_name`,`email`,`password`,`hash`,`active`,`gender`,`my_image`,`user_name`) 
             VALUES ('$first_name','$last_name','$email','$password', '$hash',0,'$gender',1,'$first_name');")
              or die(mysqli_error($conn));
     header("location:login.php");
}
}
}
 ?>
