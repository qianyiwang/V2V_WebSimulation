<?php 
$username=$_POST["username"];

$mysql_server_name="198.71.225.61"; 
$mysql_username="qianyi"; 
$mysql_password="123456789"; 
$mysql_database="my_db"; 
$conn=mysql_connect($mysql_server_name, $mysql_username,
                                $mysql_password);
mysql_select_db("my_db",$conn);
$sql = mysql_query("DELETE FROM LoggedInUser WHERE username = $username ");

mysql_close($conn);
 ?>

