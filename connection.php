<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "donor_db";
$conn=mysqli_connect($servername, $username, $password, $dbname);
if ($conn)
{
	// echo "Connection OK";
}
else
{
	echo "Connection lost".mysqli_connect_error();
}
?>