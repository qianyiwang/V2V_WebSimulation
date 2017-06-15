<?php
$mysql_server_name="198.71.225.61"; 
            $mysql_username="qianyi"; 
            $mysql_password="123456789"; 
            $mysql_database="my_db"; 


$conn=mysql_connect($mysql_server_name, $mysql_username,
                                $mysql_password);


if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];

  $path = $_FILES["file"]["tmp_name"];
  $myfile = fopen($path, "r") or die ("Unable to open file!");
  $i = 0;
  while(!feof($myfile))
  {
      $line = fgets($myfile);
      $pos = strpos($line,"-");
      $length = count($line);
      $temp = substr($line, 0, $pos-1);
      $lat = floatval($temp);
      $temp = substr($line,$pos);
      $lng = floatval($temp);
      mysql_select_db("my_db",$conn);
      $sql = mysql_query("INSERT INTO Demo3_trip2 (lat,lng) VALUES ('$lat','$lng')");
      
  }
  mysql_close($conn);
fclose($myfile);

  }
echo "upload database has been finished!";
?>
