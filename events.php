<?php

// Initializations of the variables used
$dates = array();

// MYSQL connection credentials
define('MYSQL_HOST',     'localhost');
define('MYSQL_USER',     'root');
define('MYSQL_PASSWORD', 'saksham');
define('MYSQL_DB',       'room');

// PDO - connect to the database
try 
{
	$dbh = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);

	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->setAttribute(PDO::ATTR_PERSISTENT, true);
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
	$dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
} 
catch (PDOException $e) 
{
	echo 'Error!: ' . $e->getMessage() . '<br/>';
}

// take the events from the table named "events"
try
{
	$stmt = $dbh->query('
							SELECT 
								*
							FROM
								bookings
						');
}
catch (PDOException $e)
{
	print($e->getMessage());
	die;
}
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	// because $row['event_date'] will have this form: 2012-01-10 and in Javascript we have 2012-1-10, 
	// we need to rewrite it the way we use it in Javascript so we can compare it
	$row['date'] =  date("Y-n-j", strtotime($row['date']));
	//$dates[] = $row;
	$dates[$row['date']][] = $row;
}	

echo json_encode($dates);

?>
