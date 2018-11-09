<?php
$host="localhost";
$username="root"; 
$password=" ";
$db_name="test"; 

$conn=mysqli_connect("$host", "$username")or die("cannot connect"); 

if (mysqli_connect_error()) {
  echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
}
?>
