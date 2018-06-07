<!DOCTYPE html>
<?php 
session_start();
include 'db_connect.php';
if(isset($_POST['myprofile']))
{
	$_SESSION['fsid']=-1;
}
if(isset($_SESSION['fsid'])&&$_SESSION['fsid']!=-1)
{
	$sid=$_SESSION['uid'];
	$rid=$_SESSION['fsid'];
	$res=$conn->query("SELECT * FROM user WHERE id=".$_SESSION['fsid']."")or($conn->error);
	echo "<table>";
echo "<tr>";
while($row=mysqli_fetch_assoc($res))
{
echo "<td>"; 
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['my_image'] ).'" height="200" width="200"/>';
}
echo $row['username'];
$res=$conn->query("SELECT * FROM friends WHERE (p1='$sid' AND p2='$rid') OR (p1='$rid' AND p2='$sid') ");
if($res->num_rows>0)
{
	echo "
<html>
	<button>friends</button>
</html>
";

}
else
{
	$sql1="SELECT * FROM request WHERE (sid='$sid' and rid='$rid')";
	$resi=$conn->query($sql1);
	if($resi->num_rows > 0)
	{
	echo "
	<html>
	<form action='cfr.php' method='post'>
		<input type='submit' value='cancel friend request' name='cfr'>
	</form>
	</html>
	";
	}
		else{
	echo "
	<html>
	<form action='sfr.php' method='post'>
		<input type='submit' value='send friend request' name='sfr'>
	</form>
	</html>
	";
	}
}
}
else if(isset($_SESSION['uid']))
{
	$res=$conn->query("SELECT my_image FROM user WHERE id=".$_SESSION['uid']."")or($conn->error);
	echo "<table>";
echo "<tr>";
while($row=mysqli_fetch_assoc($res))
{
echo "<td>"; 
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['my_image'] ).'" height="200" width="200"/>';
}
echo $_SESSION['username'];
}
?>