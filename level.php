<?php
session_start();
include ("dblogin.php");
$d=$_REQUEST['desision'];
$id=$_REQUEST['id'];
if($d=="Approve")
{
if($_SESSION["rights"]=="0")
{
$sql="UPDATE annual.request SET lstatus='2' WHERE request_id='$id'";
$sql1="UPDATE annual.request SET Status='Approved'WHERE request_id='$id'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
}
elseif ($_SESSION["rights"]=="2")
{
	$sql="UPDATE annual.request SET lstatus='1'WHERE request_id='$id'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
}
else
{
	$sql="UPDATE annual.request SET Status='Declined' WHERE request_id='$id'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

}
 header ('Location: vpending.php');
?>