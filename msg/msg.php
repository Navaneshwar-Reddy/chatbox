<!DOCTYPE html>
<?php
require 'db_connect.php';
session_start();
if(isset($_POST["fid"] ))
{
	$_SESSION["fid"]=$_POST["fid"];
}
$recepid=mysqli_real_escape_string($conn,$_SESSION["fid"]);
$senderid=$_SESSION["uid"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>msg</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    	
   
    <link rel="stylesheet" type="text/css" href="msgstyle.css">
</head>
<body>
<div class="containe">
	<div class="boom">
		<button type="button" onclick="window.location.href='home.php'" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-home"></span> Home
        </button>
        	
        <button style='margin-left: 31px;' type="button" onclick="window.location.href='logout.php'"class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-off"></span> LOG OUT 
        </button>
	</div>
	
	<div class="id" id="ab">
	<?php  

$recepid=mysqli_real_escape_string($conn,$_SESSION["fid"]);
$senderid=$_SESSION["uid"];
		$res=$conn->query("SELECT * FROM msgs WHERE (sender='$senderid' AND reciever='$recepid') OR (sender='$recepid' AND reciever='$senderid') ") or die(mysqli_error($conn));
		if($res->num_rows>0)
 		{
 			while($row=$res->fetch_assoc())
 				{
 					//echo $row["sender"];
 					//echo $senderid;
 					if ($row["sender"] == $senderid) 
 					{
 						# code...
 						//echo "<div style='background-color:rgb(77,255,77); font-size:25px; margin-left:50%; text-align:right; display:inline;width:100%;  border-radius:10px; padding:10px; margin-top:10px; '>".$row["msg"]."</div>";
 						if ($row["isfile"] == 0)
 						{
 						echo "<div style='color:black; font-size:25px; text-align:right;   border-radius:10px; padding:10px; margin-top:10px; overflow:scroll; word-wrap:break-word; '>".
 						" 
 					<span style=' border:2px rgb(128,255,128) solid; border-radius:10px; background-color:rgb(128,255,128);padding:10px;word-wrap:break-word;'>".$row["msg"]."</span>"."</div>";
 					echo nl2br("\n");
 					echo nl2br("\n");
 					//echo nl2br("\n");
 						}
 						if ($row["isfile"] == 1)
 						{
 							//$_SESSION["time"]=$row["tm"];
 							echo "<!DOCTYPE html>
 							<html>
 							<body>
                             
 							<a style='float:right;' href='test.php?id=".$row['filename']."'><button><span class='glyphicon glyphicon-download'></span>".$row['filename']."</button></a>
        					<br>
        					<br>
        					</body>
        					</html>";
 						}
 							
 					}
 					else
 					{
 						//echo "<div style='background-color:rgb(255,255,173); font-size:25px;  margin-left:10px; width:200px;display:inline; border-radius:10px; padding:10px; margin-top:10px;'>".$row["msg"]."</div>";
 						if ($row["isfile"] == 0)
 						{
 						echo "<div style='color:black; font-size:25px;  display:inline-block; margin-left:10px; text-align:left; width:500px; box-sizing:border-box;word-wrap:break-word;  border-radius:10px; padding:10px; margin-top:10px; '>"."
 						<span style='border:2px rgb(255,255,128) solid;word-wrap:break-word; border-radius:10px;background-color:rgb(255,255,128);padding:10px;'>" .$row["msg"]."</span>"."</div>";
 						echo nl2br("\n");
 					echo nl2br("\n");
 						}
 						if ($row["isfile"] == 1)
 						{
 							//$_SESSION["time"]=$row["tm"];
 							echo "<!DOCTYPE html>
 							<html>
 							<body>
 							<a style='float:left;' href='test.php?id=".$row['filename']."'><button><span class='glyphicon glyphicon-download'></span>".$row['filename']."</button></a>
        					<br>
        					<br>
        					</body>
        					</html>";
        					
 					    }
 					
 					
 				}
		}
	}

	?>

</div>

<script type="text/javascript">
	var objDiv = document.getElementById("ab");
objDiv.scrollTop = objDiv.scrollHeight;
</script>
<div class="id1">
<form id="fir1" method="POST" action="target.php">
	<input type="text" name="msg" autofocus required>
	<button type="submit" name="submit1" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-send"></span> Send 
        </button>

</form>
<!--<form method="POST" action="target.php" enctype="multipart/form-data">
 <input type="file" name="myimage">
 <input type="submit" name="submit_image" value="Upload">
</form>-->
<form id="fir" method="post" action="target.php" enctype="multipart/form-data" style="margin-right:0px;">
	<label for="files1" class="btn"><span class="glyphicon glyphicon-paperclip"></span></label>
  <input id="files1" style="visibility:hidden;" type="file" name="myimage">
<script type="text/javascript">
 document.getElementById("files1").onchange = function() 
 {
 	//document.getElementById("files2");
    document.getElementById("fir").submit();

};
</script>

</form>
</div>
</div>
</body>
</html>