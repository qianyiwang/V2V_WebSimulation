<?php 
$str = $_GET["str"];
$i = 0;
$j = 0;
$Lat1 = array();
$Lng1 = array();
$Lat2 = array();
$Lng2 = array();
$mysql_server_name="198.71.225.61"; 
            $mysql_username="qianyi"; 
            $mysql_password="123456789"; 
            $mysql_database="my_db"; 


$conn=mysql_connect($mysql_server_name, $mysql_username,
                                $mysql_password);

mysql_select_db("my_db",$conn);
$result = mysql_query("SELECT * FROM " . $str . "_trip1");
//mysql_data_seek($result,$num);
while ($row = mysql_fetch_array($result))
{
	$lat = $row["lat"];
	$lng = $row["lng"];
	$Lat1[$i]=$lat;
	$Lng1[$i]=$lng;
	$i++;
}
$result = mysql_query("SELECT * FROM " . $str . "_trip2");
while ($row = mysql_fetch_array($result))
{
	$lat = $row["lat"];
	$lng = $row["lng"];
	$Lat2[$j]=$lat;
	$Lng2[$j]=$lng;
	$j++;
}
$coordinate=array("lat_trip1"=>$Lat1,"lng_trip1"=>$Lng1,"lat_trip2"=>$Lat2,"lng_trip2"=>$Lng2);

echo json_encode($coordinate);
mysql_close($conn);
 ?>