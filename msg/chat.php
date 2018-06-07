<?php  
require 'db_connect.php';
session_start();
if(isset($_POST["fid"] ))
{
	$_SESSION["fid"]=$_POST["fid"];
}
$recepid=mysqli_real_escape_string($conn,$_SESSION["fid"]);
$senderid=$_SESSION["uid"];
		$res=$conn->query("SELECT * FROM msgs WHERE (sender='$senderid' AND reciever='$recepid') OR (sender='$recepid' AND reciever='$senderid') ") or die(mysqli_error($conn));
		if($res->num_rows>0)
 		{
 			while($row=$res->fetch_assoc())
 				{
 					//echo $row["sender"];
 					//echo $senderid;
 					if ($row["sender"] == $senderid) {
 						# code...
 						//echo "<div style='background-color:rgb(77,255,77); font-size:25px; margin-left:50%; text-align:right; display:inline;width:100%;  border-radius:10px; padding:10px; margin-top:10px; '>".$row["msg"]."</div>";
 						echo "<div style='color:black; font-size:25px;  display:inline-block; text-align:right; width:100%;  border-radius:10px; padding:10px; margin-top:10px; '>"."
 						<span style='border:2px rgb(128,255,128) solid; border-radius:10px;background-color:rgb(128,255,128);padding:10px;'>" .$row["msg"]."</span>"."</div>";
 					echo nl2br("\n");
 					echo nl2br("\n");
 					//echo nl2br("\n");
 					}
 					else
 					{
 						echo "<div style='background-color:rgb(255,255,173); font-size:25px;  margin-left:10px; width:200px;display:inline; border-radius:10px; padding:10px; margin-top:10px;'>".$row["msg"]."</div>";
 						echo nl2br("\n");
 					echo nl2br("\n");
 					}
 					
 					
 				}
		}

	?>