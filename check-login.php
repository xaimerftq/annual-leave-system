<?php
session_start();
include ("dblogin.php");
$user=$_REQUEST['username'];
$pass=$_REQUEST['password'];
$sql="SELECT * FROM annual.login";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$idFound=false;
while ($row = mysqli_fetch_array($result)) {
    if($user==$row['Username'] && $pass==$row['password']){
        $_SESSION["userid"]=$row["User_ID"];
		$_SESSION["rights"]=$row["rights"];
        $idFound=true;
        $idFoundis = $row["id"];
        break;
  }
}
if ($idFound){
 header ("Location: index.php");
}else{
  header ('Location: login.php?message=Wrong Username or Password');
}
?>