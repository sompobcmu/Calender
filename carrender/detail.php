<?php
$del = $_POST['iddetail'];
$conn = new mysqli('localhost', 'root', '', 'calendar');
$sql = "SELECT * FROM appointment WHERE id ='$del' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
    	 $detail = $row;
    	}
    }	
    echo json_encode($detail);
?>
