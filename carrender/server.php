<?php 
	session_start();
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$db = mysqli_connect('localhost', 'root', '', 'calendar');

	if (isset($_POST['reg_user'])) {

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		if (empty($username))
		{ 
			echo "<script>  alert('Username is required!'); </script>";
		}
		else if(strlen($username) <5)
		{
			echo "<script>  alert('Incorrcet username have to more 5 charecter.!'); </script>";
		}
		else if($username==trim($username) && strpos($username,' ')==true)
		{
			echo "<script>  alert('Incorrcet username have to more 5 charecter.!'); </script>";
		}		
		if (empty($email)) 
		{ 
			echo "<script>  alert('Incorrcet username have to more 5 charecter.!'); </script>";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			echo "<script>  alert('Invalid E-mail'); </script>";
		}

		if (empty($password_1)) 
		{ array_push($errors, "Password is required"); 
		}
		else if(strlen($password_1) < 8)
		{
			echo "<script>  alert('Incorrcet password have to more 8 charecter.'); </script>";
		}
		else if(!preg_match("#[0-9]+#", $password_1))
		{
			echo "<script>  alert('Password must include at least one number!'); </script>"; 
		}
		else if(!preg_match("#[a-z]+#", $password_1))
		{
			echo "<script>  alert('Password must include at least one lower-case character!'); </script>";
		}
		else if(!preg_match("#[A-Z]+#", $password_1))
		{
			echo "<script>  alert('Password must include at least one Upper-case character!'); </script>";
		}

		if ($password_1 != $password_2) {
			echo "<script>  alert('The two passwords do not match.!'); </script>";
		}
		if (count($errors) == 0) {
			$query = "INSERT INTO login (username, email, password) VALUES('$username', '$email', '$password_1')";

			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');
		}

	}
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			echo "<script>  alert('Username is required!'); </script>";
		}
		if (empty($password)) {
			echo "<script>  alert('Password is required'); </script>";
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: calendar.php');
			}else {
				echo "<script>  alert('Wrong username/password combination'); </script>";				
			}
		}
	}
	if (isset($_POST['add'])) {
		$usename = $_SESSION['username'];
		$date = $_POST['date'];
		$title = $_POST['title'];
		$details = $_POST['details'];
		$Time_start = $_POST['start_time'];
		$Time_end = $_POST['end_time'];
	if ($db->connect_error) {
   	 die("Connection failed: " . $db->connect_error);
	} 

	$sql = "INSERT INTO appointment (id, date, title, details,usename,T_start,T_end) VALUES (NULL, '$date', '$title', '$details','$usename','$Time_start','$Time_end')";
	$db->query($sql);
	$db->close();
	}
	if (isset($_POST['logout_user'])) {
    echo "TEST logout";
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
