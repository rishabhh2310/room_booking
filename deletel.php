<?php
$username="root";$password="rishabh";$database="Rooms";
$a=mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$user=$_SESSION['uname'];
$query1="select * from bookings where username ='$user'";
$c=mysql_query($query1);
while($q=mysql_fetch_assoc($c))
	{
		echo "<br><b>Date:</b> ".$q['date']."\t\t<font color='white'>".$q['stime']."</font> to <font color='white'>".$q['etime']." <br> </font>".$q['room'].":\t".$q['username']." : ".$q['purpose']."<br>";
	//		$s=$s+1;
	}

if(!$q)
{
echo 'no booking to show';
}
?>
<?php
//connect to mysql database
$connection = mysqli_connect("localhost","root","rishabh","Rooms") or die("Error " . mysqli_error($connection));
?>  
<form action="deletel1.php" method="POST">
<div align="center">
    <h2>delete a booking</h2>
	<?php
//fetch data from database
$sql = "select * from bookings where username='$user'";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
?>
<datalist id="roomName1">
    <?php while($row = mysqli_fetch_array($result)) { ?>
      <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
    <?php } ?>
</datalist>
<h3>booking id:<input type="text" id="id" placeholder="choose a booking id" autocomplete="off" list="roomName1" required>
</h3>
<?php mysqli_close($connection); ?>	
<input class="button" type="submit" name="submit" id="pass" value="delete booking">
</form>
</div>

