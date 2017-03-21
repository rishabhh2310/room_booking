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
<link rel="stylesheet" href="mainstyle.css">
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
	<div align="right">
	<font size="5"><b>
	<a href="logout.php">Log Out</a></b>
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
	<br><br><br>
	<div id="dialog"></div>
	<div id="datepicker"></div>
	</div>
	</div>
	</div>
	</font>

</body>
</html>

	
</div>

	
</body>
</html>
