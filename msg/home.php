<?php
session_start();
//$_SESSION['uid']=2;
//$_SESSION['username']="vamc";
$username=$_SESSION['username'];
$uid=$_SESSION["uid"];
$_SESSION['fsid']=-1;
//$username="jagan";

?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
</head>
<body>
<form action="msg.php" method="post">
<select name="fid">
 <?php
 include 'db_connect.php';
 $res=$conn->query("SELECT * FROM friends WHERE (p1='$uid') OR (p2='$uid') ") or die("error") ;
 if($res->num_rows>0)
 {
 	echo "<option selected visibility='hidden'>Choose here</option>";
 while($row=$res->fetch_assoc())
 {
 	if($row['p1']==$uid)
 		$rt=$row['p2'];
 	else $rt=$row['p1'];
 	$res1=$conn->query("SELECT * FROM user WHERE id='$rt' ");
 	while($row1=$res1->fetch_assoc())
 	echo " <option  value=".$row1["username"].">".$row1["username"]."</option> ";
 }
}
else echo "no friends";

 ?>
 </select>
 <input type="submit" name="enterchat" value="chat">
</form>
<form action="openprof.php" method="post">
  <input list="friendsearch" name="friendsearch" autocomplete="off">
  <datalist id="friendsearch">
  <?php 
  //$uid=$_SESSION['uid'];
  $res=$conn->query("SELECT * FROM user") or die("error") ;
 if($res->num_rows>0)
 {
 while($row=$res->fetch_assoc())
 {
 	if($row['id'] != $uid )
 	echo " <option  value=".$row["user_name"].">".$row["user_name"]."</option> ";
 	else echo "heelloon";
 }
 echo "if left";
}

?>
  </datalist>
  <input type="submit" value="search" name="submit">
</form>
<form action="profile.php" method="post">
	<input type="submit" name="myprofile" value="my profile"> 
	</form>
	<form method="POST" action="uploadimg.php" enctype="multipart/form-data">
 <input type="file" name="myimage">
 <input type="submit" name="submit_image" value="Upload">
</form>
<form action="afr.php" method="post">
	<input type="submit" value="friend requests" name="afr">
</form>
</body>
</html>