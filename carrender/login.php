<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>	
	<form method="post" action="login.php">

		<div >
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div >
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div >
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="singup.php">Sign up</a>
		</p>
	</form>
</body>
</html>