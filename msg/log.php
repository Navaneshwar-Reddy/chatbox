<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="demo";
$a=$_POST["email"];
$b=$_POST["pwd"];
$a=stripcslashes($a);
$conn=mysqli_connect($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$a=mysqli_real_escape_string($conn,$a);
$result=mysqli_query($conn,"SELECT * FROM user where email='$a'") or die("failed".mysql_error($conn));
$row=mysqli_fetch_array($result);
echo $row['password'];
if( 1 && password_verify($b, $row['password']))
{
	$_SESSION['email'] = $row['email'];
	 $_SESSION['username'] = $row['usename'];
	 $_SESSION['uid']=$row['id'];
	 header("location:home.php");
}
else
{
	echo "<script>
	var r=confirm('invalid user name or password');
 	if(r)
 	{
 		window.location.href='login.php';
 		
 	}
	</script>";
	
}
$conn->close();
?>