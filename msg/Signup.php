
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>

<body>
	<div class="me">
		<img src="1.png" alt="login" style="margin-left:550px" style="border-color: white">
<form action="Signup1.php" method="post">
	<p>
	<div class="container">	
First Name:	<input type="text" name="fname" required autocomplete="off"><br>	
Last Name:	<input type="text" name="lname" required autocomplete="off"><br>
E-Mail: <input type="text" onblur="validateEmail(this);" name="email" autocomplete="off"><br>
<script>
function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}
</script>
Password: <input type="password" name="password" required><br>
<br>
<span class="hi">
Gender:</span><br>
<input type="radio" name="gender" value="Male">Male<br>
<input type="radio" name="gender" value="Female">Female<br>
<p>
			<button type="submit" id="btn" value="login" name="submit">SIGNUP</button>
		</p>
</p>
<a href="login.php" style="margin-right: 150px;">registered user? Login Here </a>
</div>
</form>

</div>

</body>
</html>