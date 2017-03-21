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
<script src="jquery-ui.min.js"></script>

<script src="script.js"></script>
<script>
function validateForm() 
{
	var x = document.forms["login"]["un"].value;
    	if (x == null || x == "") 
	{
		alert("Username must be filled out");
	        return false;
    	}
    	var y = document.forms["login"]["pw"].value;
    	if (y == null || y == "") 
	{
		alert("Password must be filled out");
	        return false;
    	}
    	
}   	
</script>
<link rel="stylesheet" href="mainstyle.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input
type="date", load files for jQuery UI Date Picker
        document.write('<link
href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
rel="stylesheet" type="text/css" />\n')
        document.write('<script
src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script
src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    }
</script>

<script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#date').datepicker();
    })
}
</script>

</head>
<body background="1.jpg">
<div class="left" id="wrapper2"><b><font size="10" color="white">
 &nbspI.I.T MANDI</b></font>
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
   <!---   <ul class="list-group">
        <li><a class="sitelink" href="login.php">A1-NKN</a></li>
      <li><a class="sitelink" href="login.php">SC-NKN</a></li>
      <li><a class="sitelink" href="login.php">SC-Confrence Room</a></li>
      <li><a class="sitelink" href="login.php">Mandi Confrence Room</a></li>
      <li><a class="sitelink" href="login.php">A5 Confrence Room</a></li>
	</ul> -->
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
    <p><b>Date *(mm/dd/yyyy) :</b><input type="date" id="date" name="date" autocomplete="off" placeholder="mm/dd/yyyy format"required></p>    
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
<font size="4">
	<div align="right">
	<form action="adminlogin.php" method="post">
	<p><input type="submit" name="submit" value="Admin Login"/></p>
	</form>
	</div>
	<div class="container">
	<div class="row">
	<div class="col-md-5">
	<font size=6 color="white">
	Upcoming Events</font>
	<font size=4 color="grey">
	<?php
	$username="root";$password="saksham";$database="room";
	$a=mysql_connect(localhost,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	$ct=date('h');
	$cy=date('Y');
	$cm=date('m');
	$cd=date('d');
	$query="select * from bookings where hour(stime)>$ct and year(date)>=$cy and month(date)>=$cm and day(date)>=$cd order by stime,date";
	$b=mysql_query($query);
	$s=0;
	while($q=mysql_fetch_array($b) and $s<=5)
	{
		echo "<br><b>Date:</b> ".$q['date']."\t\t<font color='white'>".$q['stime']."</font> to <font color='white'>".$q['etime']." <br> </font>".$q['room'].":\t".$q['username']." : ".$q['purpose']."<br>";
			$s=$s+1;
	}
	if(!$s)
	{
		echo '<br>No Upcoming Events to show';
	}	
	
	?>
	</font>
	</div>
	<div class="col-md-3">
	<font size="4">
	<div id="dialog"></div>
	<div id="datepicker"></div>
	<br><b><font color="white">Login to make a booking</b></font><br>
	<form name ="login" action="login.php" method="post" onsubmit="return validateForm()">
	<p>Username:<br><input type="text" name="un"/></p>
	<p>Password:<br><input type="password" name="pw"/></p>
	<p><input type="submit" name="submit" value="Login"/></p>
	</form>
	</div>
	</div>
	</div>
	</font>

</body>
</html>

	
</div>

	
</body>
</html>
