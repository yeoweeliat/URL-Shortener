<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Link Shortener</title>

<script>

function validateForm2(){  //form validation

	if(document.form2.user.value==""){
		alert("please enter a username");
		return false;
	}
	if(document.form2.pass.value==""){
		alert("please enter a password");
		return false;
	}
	if(!((document.getElementById("r1").checked) || (document.getElementById("r2").checked))){
		alert("please select your gender");
		return false;
	}
	if(document.form2.email.value==""){
		alert("please enter your email");
		return false;
	}
	else
		return true;
}
	
</script>
</head>
<body>

<h1>Register Page</h1>

<form name="form2" onsubmit="return validateForm2()" action="../controllers/LoginController.php" method="post">

Enter Username: <input type="text" name="user"><br><br>
Enter Password: <input type="text" name="pass"><br><br> 

Select Gender: 
<input type="radio" name="gender" value="male" id="r1"> Male
<input type="radio" name="gender" value="female" id="r2"> Female<br><br>

Enter Email: <input type="text" name="email"><br><br> 
<input type="submit" value="Register">
<input type="hidden" name="option" value="register">

</form>


</body>
</html>