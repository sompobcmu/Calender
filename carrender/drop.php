<?php
include 'server.php';

if(isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["date"])){
	$user_id = $_POST["id"];
	$title = $_POST["title"];
	$ndate = $_POST["date"];
	$sql = "UPDATE appointment SET date = '$ndate' WHERE usename ='$user_id' AND title = '$title'";
	$query = $db->query($sql);
}
?>