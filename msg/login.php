
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>LOG IN</title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>
	<div class="me">
	<img src="images.png" alt="login">

	<form action="log.php" method="post">
		<div class="container">
		<p>
		<label for="uname"><b>Username:</b></label>
			<input type="text" placeholder="enter Username" id="em" name="email" autocomplete="off" required>
		</p>
		<p>
			<label for="psw"><b>Password:</b></label>
			<input type="Password" placeholder="enter your Password" id="pa" name="pwd" required>
		</p>
		<p>
			<button type="submit" id="btn" value="login">LOGIN</button>
		</p>
<a href="signup.php" style="margin-right: 150px;">New user? Sign up Here </a>
<a href="" style="">Forgot password ?</a>
	
</div>
	</form>
</div>
</body>
</html>