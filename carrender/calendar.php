<html>
<head>

   <link rel="stylesheet" type="text/css" href="styleca.css">
  
   
   <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css">
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
   <title>Month view</title>
   <?php include('server.php') ?>
</head>
<body>
  <?php
if (!isset($_SESSION['username'])) {
  echo"<script>";
  echo"alert('ERROR login!')";
  echo "</script>";
    header('location: login.php');
  }
  ?>
  <div class="tab">
    <div class="usename"><?php echo $_SESSION['username'] ?></div>
  <a href="calendar.php"><button class="tablinks" >Month </button></a>
  <a href="week.php"><button class="tablinks" >Week</button></a>
  <a href="day.php"><button class="tablinks">Day</button></a>
  <div class="Logout"><form method="post"><button type="submit" class="btn" name="logout_user">Logout</button></form></div>
</div>
<?php 

   $today = date('d');               //Gets today’s date 
   $todaymonth = date('m');          //Gets today’s month 
   $todayyear = date('Y');           //Gets today’s year
if(isset($_REQUEST['date'])){

   $day = date('d',strtotime($_REQUEST['date']));      //Gets day of appointment (1‐31) 
   $month = date('m', strtotime($_REQUEST['date']));      //Gets month of appointment (1‐12) 
   $year = date('Y', strtotime($_REQUEST['date']));      //Gets year of appointment (e.g. 2016) 
   $days = date('t', strtotime($_REQUEST['date']));      //Gets number of days in month   
   $nmonth = strtotime($_REQUEST['date']);

}
else{
   $day = $today;
   $month = $todaymonth;     
   $year =$todayyear;      
   $days = date('t', time());      
   $nmonth = time();
}  
   $firstday = date('w', strtotime('01-' . $month . '-' . $year));  //Gets the day of the week for the 1st of  
   $dateObj   = DateTime::createFromFormat('!m', $month);
   $monthName = $dateObj->format('F');
   $prev_month = date('Y-m-d',strtotime('-1 month',$nmonth));
   $next_month = date('Y-m-d',strtotime('+1 month',$nmonth));  
?> 
   <div class="b1"><a href="?date=<?php echo $next_month; ?>"><i class="fa fa-angle-right" style="font-size:80px;color:red"></i></a></div>
   <div class="b2"><a href="?date=<?php echo $prev_month; ?>"><i class="fa fa-angle-left" style="font-size:80px;color:red"></i></a></div>
<div class="texthead"><b><?php echo $year." ".$monthName; ?></b></div>
<div class="calendar"> 
   <div class="days" style="background-color: red;"><div class="name_day"><b>Sunday</b></div></div> 
   <div class="days" style="background-color: yellow;"><div class="name_day"><b>Monday</b></div></div>
   <div class="days" style="background-color: pink;" ><div class="name_day"><b>Tuesday</b></div></div>
   <div class="days" style="background-color: green;"><div class="name_day"><b>Wednesday</b></div></div>
   <div class="days" style="background-color: orange;"><div class="name_day"><b>Thursday</b></div></div>
   <div class="days" style="background-color: purple;"><div class="name_day"><b>Friday</b></div></div>
   <div class="days" style="background-color: blue;"><div class="name_day"><b>Saturday</b></div></div>
   <?php 
   for($i=1; $i<=$firstday; $i++) 
   { 
      echo '<div class="date blankday"></div>'; 
   } 
?>
<?php 
   for($i=1; $i<=$days; $i++) 
   { 
      echo '<div class="date'; 
      if ($today == $i && $todaymonth==$month && $todayyear == $year) 
      { 
         echo ' today'; 
      }
         echo '"><b style="font-size:32.5px;">' . $i . '</b><br>'; 
         $date2 =$year.'-'.$month.'-'.$i;
$conn = new mysqli('localhost', 'root', '', 'calendar');
$sql = "SELECT * FROM appointment where date ='$date2'";
$result = $conn->query($sql);
if($sql!=null){
  while($row=$result->fetch_assoc())
      {  
        if($row['usename'] == $_SESSION['username']){
        $id= $row["id"] ;
        echo '<div class="appointment" onclick="det('.$id.')">';     
        echo $row['title'];     
        echo '</div>'; 
        echo '<br>';
        }
      }    
      echo  '</div>'; 
   } 
} 
?>
<?php 
   $daysleft = 7-(($days + $firstday)%7); 
   if($daysleft<7) 
   { 
      for($i=1; $i<=$daysleft; $i++) 
      { 
         echo '<div class="date blankday"></div>'; 
      } 
   } 
?> 
<p>
<button class="open-button" onclick="openForm()">Appointment</button>
<div class="form-popup" id="myForm">
  <form  class="form-container" method="post" >
    <h1>Appointment</h1>

    <label ><b>Date</b></label>
     <input type="date" name="date"><br>

    <br><label ><b>Title</b></label>
    <input type="text" placeholder="Enter Title" name="title" required>

    <label ><b>Time to Start Appointment</b></label>
    <br><input type="time" name="start_time"><br><br>

    <label ><b>Time to End Appointment</b></label>
    <br><input type="time" name="end_time"><br><br>

    <label ><b>details</b></label>
    <input type="text" placeholder="Enter details" name="details" required>

    <button type="submit" class="btn"  name="add">submit</button>
    <button type="button" class="btn cancel" onclick="closeForm()">closeForm</button>
  </form>
</div>
<script>
function openForm() {
    document.getElementById("myForm").style.display = "block";
}
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
</script>
<script>
  var user_id = "<?php echo $_SESSION['username']; ?>";
      $(".appointment").draggable().css("cursor","pointer");
      $(".date").droppable({
        drop: function(ev, ui) { 
          var date = "<?php echo $year; ?>" + "-" + "<?php echo $month; ?>" + "-" +  $(this).find('b').text();
          var ui = ui.draggable.text();
          if($.isNumeric($(this).find('b').text())){
            $.post("drop.php", {id : user_id, title : ui, date : date}, function(){
              location.reload();
            });
          }else{
            alert("ERROR!");
            location.reload();
          }  
        }
      });
 function det($id)
{
$.post( "detail.php", { iddetail : $id  },function(data){
    var d= data.split(',');
    var title_s = d[4].replace('"','').replace('2":"','').replace('"','');
    var date_s = d[2].replace('"','').replace('1":"','').replace('"','');
    var detail_s = d[6].replace('"','').replace('3":"','').replace('"','');
    var time_start = d[10].replace('"','').replace('5":"','').replace(':00"','');
    var time_end = d[12].replace('"','').replace('6":"','').replace(':00"','');
   $(document).ready(function() {
    var $dialog = $('<div></div>')
      .html("DATE : "+date_s+"<br> TIME : "+time_start+" - "+time_end+"<br> DETAIL : "+detail_s)
      .dialog({
        draggable: false,
        autoOpen: true,
        title: title_s,
        buttons : {
           "DELETE" : function(){
                if (confirm("Are you sure!")) {
                 $.post( "del.php", { iddelete : $id  } );
                   location.reload();
                  } else {
                   location.reload();
                  }
              document.getElementById("demo").innerHTML = txt;
            },
            "EDIT" : function(){
              var $dialog_e = $('<div></div>')
              .html("Title<br><input type='text' placeholder='Enter Title' name='title_e'  id='title_ea' required ><br><br>Time to Start Appointment<br><input type='time' name='start_time_e' id='start'><br><br>Time to End Appointment<br><input type='time' name='end_time_e' id='end'><br><br>Details<br><input type='text' placeholder='Enter details' name='details_e' required id='detail_ea'><br><br><button  name='add' id='edit'>submit</button>")
              .dialog({
               title: "Edit :"+title_s,
      });               
    $(document).ready(function(){
    $("#edit").click(function(){
        var temp = $(this).html().split('<br>');
        var title_edit = $("#title_ea").val();
        var time_start_edit = $("#start").val();
        var time_end_edit = $("#end").val();
        var detail_edit = $("#detail_ea").val();
        $.post("update.php",{idedit : $id ,title_e : title_edit, detail_e : detail_edit, time_start_e : time_start_edit, time_end_e : time_end_edit},function(data2){
          alert(data2);
          location.reload();
  } );

    });

});
            }
        }
      });

  });
  } );
}

</script>

</body>
</html>