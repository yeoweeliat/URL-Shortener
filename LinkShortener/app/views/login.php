<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Link Shortener</title>
</head>

<script>

function validateForm(){  //form validation

	if(document.form1.user.value==""){
		alert("please enter a username");
		return false;
	}
	if(document.form1.pass.value==""){
		alert("please enter a password");
		return false;
	}
	else
		return true;
}

</script>
<body>

<h1>Link Shortener Application</h1>
<h2>Login Page</h2>

<form name="form1" onsubmit="return validateForm()" action="../controllers/LoginController.php" method="post">

Username: <input type="text" name="user"><br><br>
Password: <input type="password" name="pass"><br><br>
<input type="submit" value="Login"><br><br>
<a href="../views/register.php">Register</a>
<input type="hidden" name="option" value="login">

</form>

</body>
</html>
