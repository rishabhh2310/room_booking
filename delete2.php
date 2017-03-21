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
	<font size="5">
	<a href="logout.php"><b><u>Log Out</u></b></a></div></font>
	<font color="grey">
<div class="container">
 <div class="row">
  <div class="col-md-5">
    <?php
      //session_start();
      //connect to mysql database
      $connection = mysqli_connect("localhost","root","saksham","room") or die("Error " . mysqli_error($connection));
    ?>  
    <div align="center">
    <font size="6" color="white">
    <br><br>Cancel A Booking<br><br></font>
    <font size="4" color="white">
    <form action="dfinal.php" method="POST">
    <?php
      //fetch data from database
      $cy=date('Y'); 
      $cm=date('m');
      $cd=date('d');
      $sql = "select  id from bookings where year(date)>=$cy and month(date)>=$cm and day(date)>=$cd ";
      $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    ?>
    <datalist id="id2">
    <?php while($row = mysqli_fetch_array($result)) { ?>
      <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
    <?php } ?>
    </datalist>
    <font color="grey">
    BookID:<input type="int" placeholder="choose an id" name="id" autocomplete="off" list="id2" required>
    
    <?php mysqli_close($connection); ?>
    <font color="black">
    <input type="submit" type="button" value="remove" class="button" >
    </form>
   </div>
   </div>
   <div class="col-md-4">
	<font size="4" color="White">
	<br><br><br>Check Booking/Id in the calendar<br>
	<div id="dialog"></div>
	<div id="datepicker"></div>
	<center><a href="admin.php" class="round-button2">Admin Home</a></center>
   </div>
   </div>
   </div>
   </font>

</body>
</html>

	
</div>

	
</body>
</html>
