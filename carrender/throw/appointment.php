<?php include('server.php') ?>
<form method="post" > 
   Date: <input type="date" name="date"><br /> 
   Title: <input type="text" name="title" /><br /> 
   Details:<input type="text" name="details" /><br /> 
   Time to Start Appointment : <input type="time" name="start_time"><br><br>
   Time to End Appointment : <input type="time" name="end_time"><br><br>
   <button type="submit" class="btn" name="add">submit</button>
</form> 