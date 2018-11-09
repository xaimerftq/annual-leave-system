<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script  type="text/javascript" src="menu.js"></script>
  <link rel="stylesheet" type="text/css" href="calendar.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<?php
include ("dblogin.php"); // connects to the database
session_start();
if ($_SESSION["userid"]=="") // if the user has no use id it redirect him to the login page to log in
{
header ('Location: login.php');
}
if (isset($_GET['message'])) {
    print '<script type="text/javascript">alert("' . $_GET['message'] . '");</script>';
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Employees Request History</title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="menu.css">

  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Employees Request History</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <div class="mdl-textfield__expandable-holder">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item"><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <div class="demo-avatar-dropdown">
		  <?php
$sql="SELECT name FROM annual.einfo WHERE employee_id ='$_SESSION[userid]'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) 
{
echo '<div><p>User:	'.$row["name"].'</p></div>';
}
?>
        </header>
  <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="mdl-navigation__link"  href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
    </li>
    <li class="nav-item dropdown">
	<a class="mdl-navigation__link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>My Annual Leaves</a>
	  <div class="dropdown-menu">
        <a class="dropdown-item" href="submitform.php"><i class="fa fa-pencil"></i>  Submit a Request</a>
        <a class="dropdown-item" href="history.php"><i class="fa fa-history"></i>  Annual Leave History</a>
      </div>
    </li>
			<?php
	if($_SESSION["rights"]!="1"){
echo ' 
	  <li class="nav-item dropdown">
	<a class="mdl-navigation__link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Line Manager Tasks</a>
	  <div class="dropdown-menu">
        <a class="dropdown-item" href="vpending.php"><i class="fa fa-exclamation"></i>  Pending Requests</a>
        <a class="dropdown-item" href="apending.php"><i class="fa fa-history"></i>  History</a>
      </div>
    </li>';
	}
	if($_SESSION["rights"]=="0"){
echo '
	  <li class="nav-item dropdown">
	<a class="mdl-navigation__link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Administrator</a>
	  <div class="dropdown-menu">
        <a class="dropdown-item" href="admin.php"><i class="fa fa-pencil"></i> Create New Employee</a>
        <a class="dropdown-item" href="#"><i class="fa fa-database"></i> Employee Database</a>
		<a class="dropdown-item" href="#"><i class="fa fa-flag"></i>  Organatational Structure</a>
        <a class="dropdown-item" href="#"><i class="fa fa-folder"></i> Manage Annual Leave Types</a>
      </div>
    </li>';
	}
	?>
  </ul>
</nav>
<br>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100"> 
<?php
$sql1="SELECT * FROM annual.request  ORDER BY dsub";
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn)); 
 echo'<div class="container-fluid">
			<div class="row">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									Type of Leave
								</th>
								<th>
									Dates Submit
								</th>
								<th>
									Name
								</th>
								<th>
									Surname
								</th>
								<th>
									Department
								</th>
								<th>
									From
								</th>
								<th>
									To
								</th>
								<th>
									Status
								</th>
							</tr>
</thead>';
while ($row1 = mysqli_fetch_array($result1,MYSQLI_BOTH))
{			
echo"<tbody>";		
echo "<tr>";
echo "<td>" . $row1['request_id'] . "</td>";
echo "<td>" . $row1['typeofannualleave'] . "</td>";
$ddate=$row1['dsub'];
$ddate = str_replace('-', '/', $ddate);
echo "<td>" .date('d/m/y', strtotime($ddate)). "</td>";
echo "<td>" . $row1['name'] . "</td>";
echo "<td>" . $row1['surname'] . "</td>";
echo "<td>" . $row1['department'] . "</td>";
$fdate=$row1['fromd'];
$fdate = str_replace('-', '/', $fdate);
echo "<td>" .date('d/m/y', strtotime($fdate)). "</td>";
$tdate=$row1['tod'];
$tdate = str_replace('-', '/', $tdate);
echo "<td>" .date('d/m/y', strtotime($tdate)). "</td>";
if($row1['Status']=='Approved')
{
echo "<td><span class='label label-success'>".$row1["Status"]."</span></td>";
}
if($row1['Status']=='Declined')
{
echo '<td><span class="label label-important">'.$row1["Status"].'</span></td>';
}
if($row1['Status']=='Pending')
{
echo "<td><span class='label label-warning'>".$row1["Status"]."</span></td>";
}
echo "</tr>";
echo"</tbody>";	
}
echo "</table>";
?>

      </main>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
          </mask>
          <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
          </g>
        </defs>
      </svg>
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <g id="chart">
            <g id="Gridlines">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
            </g>
            <g id="Numbers">
              <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
              <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
              <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
              <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
              <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
              <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
              <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
              <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
              <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
              <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
              <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
              <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
              <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3 	"/>
            </g>
            <g id="Layer_4">
              <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125 	"/>
            </g>
          </g>
        </defs>
      </svg>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

  <script>
  var button = document.createElement('button');
  var textNode = document.createTextNode('Click Me!');
  button.appendChild(textNode);
  button.className = 'mdl-button mdl-js-button mdl-js-ripple-effect';
  componentHandler.upgradeElement(button);
  document.getElementById('container').appendChild(button);
</script>
  </body>
</html>
