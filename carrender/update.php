<?php
	$id = $_POST['idedit'];
	$title_edit = $_POST['title_e'];
	$details_edit = $_POST['detail_e'];
	$start_edit = $_POST['time_start_e'];
	$end_edit = $_POST['time_end_e'];
	$conn = new mysqli('localhost', 'root', '', 'calendar');
	$sql = "UPDATE appointment SET  title='$title_edit', details='$details_edit', T_start='$start_edit', T_end='$end_edit' where id ='$id'";
	$result = $conn->query($sql);
			echo "OK!";
?>


