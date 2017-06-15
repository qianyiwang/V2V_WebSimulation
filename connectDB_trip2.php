<?php 
$num=$_GET["q"];
$i=strval($i);
$mysql_server_name="198.71.225.61"; 
            $mysql_username="qianyi"; 
            $mysql_password="123456789"; 
            $mysql_database="my_db"; 


$conn=mysql_connect($mysql_server_name, $mysql_username,
                                $mysql_password);

mysql_select_db("my_db",$conn);
$result = mysql_query("SELECT * FROM trip2");
mysql_data_seek($result,$num);
$row = mysql_fetch_array($result);

$lat = $row['lat'];
$lng = $row['lng'];
$coordinate=array($lat,$lng);
echo json_encode($coordinate);
mysql_close($conn);
 ?>