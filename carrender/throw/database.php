<?php
session_start();
$usename = $_SESSION['username'];
		$date = $_POST['date'];
		$title = $_POST['title'];
		$details = $_POST['details'];
		$Time_start = $_POST['start_time'];
		$Time_end = $_POST['end_time'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "calendar";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
	if ($conn->connect_error) {
   	 die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO appointment (id, date, title, details,usename,T_start,T_end) VALUES (NULL, '$date', '$title', '$details','$usename','$Time_start','$Time_end')";

	if($conn->query($sql)===TRUE){
  	 echo "New reocord created succesfully";
	} else{
 	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>