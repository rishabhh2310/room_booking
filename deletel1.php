<?php
$username="root";$password="rishabh";$database="Rooms";
$a=mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$id=$_POST['id'];
$user=$_SESSION['uname'];
$query1="select * from bookings where usernane='$user'";
$b=mysql_query($query1);
if(!$b)
{
	echo'error occured';
	mysqli_close($a);
}
$rows = mysql_num_rows($b);
//$j=mysql_fetch_array($b);
//else
//{
//if(empty($j))
//{
//echo 'booking does not exist';
//}
if($rows==0)
{
echo 'booking does not exist';
}
else
{
$query="delete from bookings where id='$id' username='$user'";
$c=mysql_query($query);
echo 'booking sucessfully removed';
}
//}
?>

