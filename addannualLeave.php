<?php
session_start();
include ("dblogin.php");
$id;
$name;
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$sql="INSERT INTO annual.anleavetypes(annualleaveid,annualname)VALUES('$id','$name')";
$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
header ('Location: manunalleaves.php?message=Request Submitted');
?>