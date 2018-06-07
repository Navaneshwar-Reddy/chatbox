<?php
session_start();
session_destroy();
?>


<!DOCTYPE html>
<html>
<head>
	<title>logout</title>
	<style >
		div
		{
			border: 2px solid green;
			margin-top:270px;
			margin-right:380px ;
			margin-left: 380px;
			border-radius: 5px;
		}
		h2
		{
			text-align: center;
			font-family: sans-serif;
		}
		button
		{
			margin-left: 215px;
			background-color: green;
    		border: none;
    		color: white;
    		padding: 10px 10px;
    		border-radius: 8px;
			margin-bottom: 5px;
		}
		button:hover
		{
    		background-color: blue;
		}
	</style>
</head>
<body>
<div>
	<h2>You Have Been Logged Out</h2>
		<button onclick="window.location.href='login.php'">click here to login again</button>
</div>
</body>
</html>

