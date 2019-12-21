<!DOCTYPE html>
<html>
<head>
<title>Day</title>
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
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$prev_date = date('Y-m-d', strtotime($date .' -1 day'));
$next_date = date('Y-m-d', strtotime($date .' +1 day'));
$day = date('l',strtotime($date));
$days = date('d',strtotime($date));
$year = date('Y',strtotime($date));
$month = date('F',strtotime($date));
?>
<div class="tab">
  <div class="usename"><?php echo $_SESSION['username'] ?></div>
  <a href="calendar.php"><button class="tablinks" > Month </button></a>
  <a href="week.php"><button class="tablinks" >Week</button></a>
  <a href="day.php"><button class="tablinks">Day</button></a>
  <div class="logout"><form method="post"><button type="submit" class="btn" name="logout_user">Logout</button></form></div>
</div>
<div class="arrow1"><a href="?date=<?=$prev_date;?>" ><i class="fa fa-angle-left" style="font-size:80px;color:red"></i></a></div>
<div class="arrow2"><a href="?date=<?=$next_date;?>"><i class="fa fa-angle-right" style="font-size:80px;color:red "></i></a></div>
<div class="tap1">
	<div class="texthead" ><?php echo "\r\n<b>$year $month $days</b>\r\n"; ?></div>

</div>

<br>
	<?php
  echo '<div class="day">';
  echo '<div class="head_day">';
  echo '<div style="position: relative; top:5%; font-size: 170%;"><b">'.$day.'</b></div>';
  echo '</div>';
    $arrayt=array();
       array_push($arrayt,'00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23');
            $num=count($arrayt);
            echo "<br><br><br>";
            echo '<div style="float:left;">';
        for($i=0;$i<$num;$i++){
            echo '<div class= "br_time">'."<div class='time_t'> $arrayt[$i]".":"."00".'</div></div>';
            echo '<div class= "br_line">'.'</div>';
        }
        echo '</div>';  
       $conn = new mysqli('localhost', 'root', '', 'calendar');
       $sql = "SELECT * FROM appointment";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
          while($row = $result->fetch_array()) {
          if($row["date"] == $date){
            if($row['usename'] == $_SESSION['username']){
            $hour_start=date('H',strtotime($row['T_start']));
            $hour_end=date('H',strtotime($row['T_end']));
            $min_start=date('i',strtotime($row['T_start']));
            $min_end=date('i',strtotime($row['T_end']));
            $top = $hour_start+($min_start/60);
            $heigth = $hour_end+($min_end/60);
            $end_time = $heigth - $top;
            $id= $row["id"] ;
            if($top==0 && $heigth==0){
              $top=5;
              $end_time=85;
            }
            else{
              $top = $top*85;
              $end_time = $end_time*85; 
            }
            
            echo '<div  style = "border: 2.5px solid; background:#4d4dff; width: 117px;float: left;margin-left: 10px; height:'.$end_time.'px; top: '.$top.'px; position: relative;" onclick="det('.$id.')">';
            echo '<div class="title_day"><br>'.$row['title'].'</div>'.'</div>';
}           
            }
        }
}
        $result->close();
        $conn->close();
        echo '</div>';
      ?>

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
function del($id)
{
  var x = <?php echo $id;?>;
  if (confirm("Are you sure!")) {
    $.post( "del.php", { iddelete : x  } );
    location.reload();
  } else {
     location.reload();
  }
  document.getElementById("demo").innerHTML = txt;
}
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
        draggable: true,
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