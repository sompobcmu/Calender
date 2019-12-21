<?php
$del = $_POST['iddelete'];
$conn = new mysqli('localhost', 'root', '', 'calendar');
$sql = "DELETE FROM appointment where id ='$del'";
$result = $conn->query($sql);
?>