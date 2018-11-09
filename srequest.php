<?php
session_start();
include ("dblogin.php");
$name;
$surname;
$department;
$sql="SELECT * FROM annual.einfo WHERE employee_id ='$_SESSION[userid]'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) 
{
$name=$row["name"];
$surname=$row["surname"];
$department=$row["department"];
}
$type=$_REQUEST['product'];
$datef=$_REQUEST['datef'];
$datef = str_replace('/', '-', $datef);
$datef = date("Y/m/d", strtotime($datef));
$datet=$_REQUEST['datet'];
$datet = str_replace('/', '-', $datet);
$datet = date("Y/m/d", strtotime($datet));
$timeDiff = abs($datet - $datef);
$numberDays = $timeDiff/86400;
$dur = intval($numberDays);
if($datef>=$datet)
{
	header ('Location: submitform.php?message=Dates are invalid');
}
if($datef<$datet)
{
$com=$_REQUEST['comments'];
$session=$_SESSION["userid"];
$cdate=date("Y/m/d");
$s=0;
$status="Pending";
$sql="INSERT INTO annual.request (sessionid,name,surname,department,typeofannualleave,fromd,tod,duration,dsub,Status,lstatus,comments) VALUES('$session','$name','$surname','$department','$type','$datef','$datet','$dur','$cdate','$status','$s','$com')";
$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
header ('Location: index.php?message=Request Submitted');
}
?>