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
<div class="main" id="wrapper5">

<font size="6" color="white">
<br>
<br>
Admin Login
</font>
<font size="4" color="grey">

<form method="POST" action="admin.php">
Username:<br><input type="text" name="user" required>*<br>
<br>Password:<br><input type="password" name="pass" id="pass" required>*<br><br>
<input class="button" type="submit" name="submit" id="pass" value="Log-In">
</form>
<br>
<a href = "1.php" class="button"> <b><u> Back To home </b></u> </a>
<br>

</div>
</body>
</html>
</div>
</body>
</html>
