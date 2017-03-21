<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ORBS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.css">
<script src="jquery.js"></script>
<script src="bootstrap.min.js"></script>
<link href="jquery-ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="ui.theme.css" type="text/css" media="all"/>
<script src="jquery.min.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
<script src="jquery-ui.min.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="mainstyle.css">
<script>
function validateForm() 
{
	var x = document.forms["login"]["hi"].value;
    	if (x == null || x == "") 
	{
		alert("All fields must be filled out");
	        return false;
    	}
    	var y = document.forms["login"]["mi"].value;
    	if (y == null || y == "") 
	{
		alert("All fields must be filled out");
	        return false;
    	}
    	var z = document.forms["login"]["he"].value;
    	if (z == null || z == "") 
	{
		alert("All fields must be filled out");
	        return false;
    	}
    	var a = document.forms["login"]["me"].value;
    	if (a == null || a == "") 
	{
		alert("All fields must be filled out");
	        return false;
    	}
    	var b = document.forms["login"]["date"].value;
    	if (b == null || b == "") 
	{
		alert("All fields must be filled out");
	        return false;
    	}
    	
}   	
function formtrue()
{

}
</script>
</head>
<body background="1.jpg">
<div class="left" id="wrapper2"><b><font size="10" color="white">
I.I.T MANDI</b></font>
</div>
<div class="top">
   	<div align="center"><b><h1>ONLINE ROOM BOOKING SYSTEM</h1></b></div>
</div>
<div id= "wrapper" class="left">
<br>
<nav class="navbar-default navbar-side" role="navigation">
<font size="5">
  <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1"><h3><b>Check Bookings</b></h3></a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <form action="checking.php" method="post">
	<?php
      $connection = mysqli_connect("localhost","root","saksham","room") or die("Error " . mysqli_error($connection));
      $sql = "select name from rooms";
      $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    ?>
    <datalist id="id1">
    <?php while($row = mysqli_fetch_array($result)) { ?>
      <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
    <?php } ?>
    </datalist>
    <font color="grey">
    Room:<input type="int" placeholder="choose a room" name="room" autocomplete="off" list="id1" required>
    <p><b>Date *(m/d/y) :</b><input type="text" id="datepicker" name="date" required></p>    
    <?php mysqli_close($connection); ?>
	<font color="black"><b><input type="submit" type="button" value="check" class="button"></b>
	</form>  
	</font>
  </div>
</div>
</font>
</nav>
<nav class="navbar-default navbar-side" role="navigation">
<font size="5">
  <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2"><h3><b>Important links</b></h3></a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <ul class="list-group">
        <li><a class="sitelink" href="http://www.insite.iitmandi.ac.in">Insite</a></li>
      <li><a class="sitelink" href="http://www.iitmandi.ac.in">IIT Mandi website</a></li>
      <li><a class="sitelink" href="http://www.insite.iitmandi.ac.in/moodle">Moodle</a></li>
	</ul>
  </div>
</div>
</font>
</nav>
</div>
<div class="main" id="wrapper3">

<font size="6" color="white">
<?php
  session_start();
  $username="root";$password="saksham";$database="room";
  $a=mysql_connect(localhost,$username,$password);
  @mysql_select_db($database) or die( "Unable to select database"); 
  $uname=$_SESSION['uname'];
  $hi=$_POST['hi'];
  $mi=$_POST['mi'];
  $hf=$_POST['he'];
  $mf=$_POST['me'];
  $room=$_POST['room'];
  $purpose=$_POST['purpose'];
  $st=$hi.":".$mi.":00";
  $et=$hf.":".$mf.":00";
  $date=$_POST['date'];
  $month= $date[0].$date[1];
  $day= $date[3].$date[4];
  $year= $date[6].$date[7].$date[8].$date[9];
  $date= $year."-".$month."-".$day;
  $query="select etime,stime from bookings where room='$room' and hour(stime)='$hi' and minute(stime)<='$mi' or hour(stime)<'$hi' and date='$date'  order by stime desc";
  $b=mysql_query($query);
  $j=mysql_fetch_array($b);
  $q="select stime,etime from bookings where room='$room' and hour(stime)='$hi' and minute(stime)>='$mi' or hour(stime)>'$hi'  and date='$date'  order by stime";
  $b1=mysql_query($q);
  $j1=mysql_fetch_array($b1);
  $ehour= $j['etime'][0].$j['etime'][1];
  $emin= $j['etime'][3].$j['etime'][4];
  $s1hour= $j1['stime'][0].$j1['stime'][1];
  $s1min= $j1['stime'][3].$j1['stime'][4];  
  if(($ehour<$hi or $ehour=$hi and $emin<$mi) and (($hf<$s1hour or $hf=$s1hour and $mf<$s1min) or (!$s1hour and !$s1min)))
  {
    $q2="insert into bookings values(null,null,'$date','$room','$st','$et','$purpose','$uname')";
    $b2=mysql_query($q2);
    if($b2)
    echo "Successfully booked room<br>You will receive a confirmation email.";
    $quera = "select emailid from user where uname = '$uname'";
    $ba=mysql_query($quera);
    $ja=mysql_fetch_array($ba);
    $quera2 = "select id from bookings where username = '$uname' order by id desc limit 1";
    $ba2=mysql_query($quera2);
    $ja2=mysql_fetch_array($ba2);
    $mera=$ja2['id'];
    
    // sending system generated email
    
    $to = $ja['emailid'];
    //echo $ja['emailid'];
    $subject = 'Confirmation of booking';
    $message = "Congratulations your booking has been verified. Your booking id for '$room' on '$date' is '$mera'.";
    $headers = 'Confirmation:';
    if (mail($to,$subject,$message,$headers)){
        echo("<script>alert('Mail sent')</script>");
    }else{
        echo("<script>alert('Mail sending failed')</script>");
    }
    
  }
  else
    echo "Sorry<br>Time not available";
?>
<br>
<br>
<div align="left">
	<a href="logout.php">Log Out</a>
</div>
</div>
</body>
</html>
</div>
</body>
</html>
