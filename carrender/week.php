<html>
<head>
<title>week</title>
<link rel="stylesheet" type="text/css" href="style_day.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.3/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
</head>
<body>
<?php include('server.php') ?>
<?php
if (!isset($_SESSION['username'])) {
    header('location: login.php');
  }
?>
<?php 
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$day = date('d',strtotime($date));
$month = date('m',strtotime($date));
$month_name = date('F',strtotime($date));
$year = date('Y',strtotime($date));
$newdate = date(strtotime($date));
$nextW = date('Y-m-d',strtotime('+1 week',$newdate));
$prevtW = date('Y-m-d',strtotime('-1 week',$newdate));

$date1 = date('Y-m-d',strtotime('+0 day',$newdate));
$day1 = date('d',strtotime($date1));
$day_name1 = date('l',strtotime($date1));
$month1 = date('m',strtotime($date1));
$year1 = date('Y',strtotime($date1));

$date2 = date('Y-m-d',strtotime('+1 day',$newdate));
$day_name2 = date('l',strtotime($date2));
$day2 = date('d',strtotime($date2));
$month2 = date('m',strtotime($date2));
$year2 = date('Y',strtotime($date2));

$date3 = date('Y-m-d',strtotime('+2 day',$newdate));
$day_name3 = date('l',strtotime($date3));
$day3 = date('d',strtotime($date3));
$month3 = date('m',strtotime($date3));
$year3 = date('Y',strtotime($date3));

$date4 = date('Y-m-d',strtotime('+3 day',$newdate));
$day_name4 = date('l',strtotime($date4));
$day4 = date('d',strtotime($date4));
$month4 = date('m',strtotime($date4));
$year4 = date('Y',strtotime($date4));

$date5 = date('Y-m-d',strtotime('+4 day',$newdate));
$day_name5 = date('l',strtotime($date5));
$day5 = date('d',strtotime($date5));
$month5 = date('m',strtotime($date5));
$year5 = date('Y',strtotime($date5));

$date6 = date('Y-m-d',strtotime('+5 day',$newdate));
$day_name6 = date('l',strtotime($date6));
$day6 = date('d',strtotime($date6));
$month6 = date('m',strtotime($date6));
$year6 = date('Y',strtotime($date6));

$date7 = date('Y-m-d',strtotime('+6 day',$newdate));
$day_name7 = date('l',strtotime($date7));
$day7 = date('d',strtotime($date7));
$month7 = date('m',strtotime($date7));
$year7 = date('Y',strtotime($date7));
?>

<div class="tab" >
  <div class="usename"><?php echo $_SESSION['username'] ?></div>
  <a href="calendar.php"><button class="tablinks" > Month </button></a>
  <button class="tablinks" >Week</button>
  <a href="day.php"><button class="tablinks">Day</button></a>
  <div class="logout"><form method="post"><button type="submit" class="btn" name="logout_user">Logout</button></form></div>
</div>
<div class="tap1" style="width: 70%; left: 10%;">
  <div class="texthead_week"><?php echo "\r\n<b>$year $month_name</b>\r\n"; ?></div>
</div>
<div class="arrow1" style="left: 35%;"><a href="?date=<?=$prevtW;?>" ><i class="fa fa-angle-left" style="font-size:80px;color:red"></i></a></div>
<div class="arrow2" style="right: 45%;"><a href="?date=<?=$nextW;?>"><i class="fa fa-angle-right" style="font-size:80px;color:red"></i></a></div>
<br>
<div class="day_2" style="width: 70%; left: 10%;">

  <div  class="day_week" style="top: 2%; left: 2%;"> <?php echo "<b style=' position: relative; top: 37%; left: 0%;'>$day_name1</b>" ?></div>
  <div  class="day_week" style="top: -16.5%; left: 16%;"> <?php echo "<b style=' position: relative; top: 37%; left: 0%;'>$day_name2</b>" ?></div>
  <div  class="day_week" style="top: -35%; left: 30%;"> <?php echo "<b style=' position: relative; top: 37%; left: 0%;'>$day_name3</b>" ?></div>
  <div  class="day_week" style="top: -53.5%; left: 44%;"> <?php echo "<b style=' position: relative; top: 37%; left: 0%;'>$day_name4</b>" ?></div>
  <div  class="day_week" style="top: -72%; left: 58%;"> <?php echo "<b style=' position: relative; top: 37%; left: 0%;'>$day_name5</b>" ?></div>
  <div  class="day_week" style="top: -90.5%; left: 72%;"> <?php echo "<b style=' position: relative; top: 37%; left: 0%;'>$day_name6</b>" ?></div>
  <div  class="day_week" style="top: -109%; left: 86%;"> <?php echo "<b style=' position: relative; top: 37%; left: 0%;'>$day_name7</b>" ?></div>

  <div  class="app_week" style="top: -106%; left: 2%;">
   <?php 
   echo "<b>".$day1."</b>";
   $conn = new mysqli('localhost', 'root', '', 'calendar');
  $sql = "SELECT * FROM appointment where date ='$date1'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        if($row['usename'] == $_SESSION['username']){
          $id= $row["id"] ;
         echo "<div class='title_week' onclick='det(".$id.")'>";
         echo $row["title"];
         echo "</div>";
         echo "<br>";
      } 
      }
    }
   ?>
 </div>
 <div  class="app_week" style="top: -177.5%;left: 16%;">
   <?php 
    echo "<b>".$day2."</b>";
   $conn = new mysqli('localhost', 'root', '', 'calendar');
  $sql = "SELECT * FROM appointment where date ='$date2'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        if($row['usename'] == $_SESSION['username']){
         $id= $row["id"] ;
          echo "<div class='title_week' onclick='det(".$id.")'>";
         echo $row["title"];
         echo "</div>";
         echo "<br>";
      } 
      }
    }
   ?>
 </div>
 <div  class="app_week" style="top: -249%; left: 30%;">
    <?php 
     echo "<b>".$day3."</b>";
  $sql = "SELECT * FROM appointment where date ='$date3'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        if($row['usename'] == $_SESSION['username']){
         $id= $row["id"] ;
         echo "<div class='title_week' onclick='det(".$id.")'>";
         echo $row["title"];
         echo "</div>";
         echo "<br>";
      } 
      }
    }
   ?>
 </div>
 <div  class="app_week" style="top: -320.5%; left: 44%;">
    <?php 
     echo "<b>".$day4."</b>";
  $sql = "SELECT * FROM appointment where date ='$date4'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        if($row['usename'] == $_SESSION['username']){
         $id= $row["id"] ;
         echo "<div class='title_week' onclick='det(".$id.")'>";
         echo $row["title"];
         echo "</div>";
         echo "<br>";
      } 
      }
    }
   ?>
 </div>
 <div  class="app_week" style="top: -392%; left: 58%;">
    <?php 
     echo "<b>".$day5."</b>";
  $sql = "SELECT * FROM appointment where date ='$date5'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        if($row['usename'] == $_SESSION['username']){
         $id= $row["id"] ;
           echo "<div class='title_week' onclick='det(".$id.")'>";
         echo $row["title"];
         echo "</div>";
         echo "<br>";
      } 
      }
    }
   ?>
 </div>
 <div  class="app_week" style="top: -463.5%; left: 72%;">
    <?php 
     echo "<b>".$day6."</b>";
  $sql = "SELECT * FROM appointment where date ='$date6'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        if($row['usename'] == $_SESSION['username']){
         $id= $row["id"] ;
           echo "<div class='title_week' onclick='det(".$id.")'>";
         echo $row["title"];
         echo "</div>";
         echo "<br>";
      } 
      }
    }
   ?>
 </div>
 <div  class="app_week" style="top: -535%; left: 86%;">
    <?php 
     echo "<b>".$day7."</b>";
  $sql = "SELECT * FROM appointment where date ='$date7'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        if($row['usename'] == $_SESSION['username']){
         $id= $row["id"] ;
         echo "<div class='title_week' onclick='det(".$id.")'>";
         echo $row["title"];
         echo "</div>";
         echo "<br>";
      } 
      }
    }
   ?>
 </div>
</div>
<script>
function open() { 
       alert("Success!");
    }
</script>
<button class="open-button" onclick="openForm()">Appointment</button>
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

</script>
<script>
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
        autoOpen: true,
        title: title_s,
         buttons : {

           "DELETE" : function(){
                if (confirm("Are you sure!")) {
                 $.post( "del.php", { iddelete : $id  } );      
                  location.reload(); 
                  } else {                  
                  }
              document.getElementById("demo").innerHTML = txt;
                location.reload();
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
var user_id = "<?php echo $_SESSION['username']; ?>";
      $(".title_week").draggable().css("cursor","pointer");
      $(".app_week").droppable({
        drop: function(ev, ui) { 
          var date = "<?php echo $year; ?>" + "-" + "<?php echo $month; ?>" + "-" +  $(this).find('b').text();
          var ui = ui.draggable.text();
          if($.isNumeric($(this).find('b').text())){
            $.post("drop.php", {id : user_id, title : ui, date : date}, function(){
               location.reload();
            });
          }else{
            alert("error");
            location.reload();
          }  
        }
      });
</script>


</body>
</html> 