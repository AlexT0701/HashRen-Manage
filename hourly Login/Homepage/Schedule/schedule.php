<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen | My Schedule</title>
  <link rel="stylesheet" href="homepage.css">
  <link rel="stylesheet" href="schedule.css">
</head>

<body>
<div class="header">
  <a href="homepage.php" class="logo">HashRen Manage</a>
  <div class="header-right">
    <a href="about.php">About</a>
    <a href="loginTest.php">Logout</a>
  </div>
</div>

<p>
</p>
<p>
</p>

<body>

<?php
      // database connection code
      // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
      $servername = "localhost";
      $username = "hashren9_james";
      $password = "Mordor72!";
      $databasename = "hashren9_myDB";

      $con = mysqli_connect($servername, $username, $password, $databasename);

      // Check if we can connect to server
      if ($con === false) {
        die('Could not connect to server: ' .mysqli_error());
      }
	  
	  $query = "SELECT User FROM tbl_current";
      $retval = mysqli_query($con, $query);
	  
	  $currentUsr;
	  
	  while ($row = mysqli_fetch_assoc($retval)) {
        $currentUsr = $row['User'];
	  }
	  
	  $query = "SELECT fldUser, fldName FROM tbl_userInfo";
      $retval = mysqli_query($con, $query);
	  
	  while ($row = mysqli_fetch_assoc($retval)) {
		  if ($currentUsr == $row['fldUser'])
		  {
			  $currentUsr = $row['fldName'];
		  }
	  }

      $query = "SELECT User, Sun, Mon, Tues, Wed, Thur, Fri, Sat FROM tbl_availability";
      $retval = mysqli_query($con, $query);

      if ($retval === false) {
        die('Could not get data: ' .mysqli_error());
      }
      else {
        //echo "Data Retrieved: <br>";
      }
	  
	  //$usr = $_POST['txtName'];
	  $txtSun;
	  $txtMon;
	  $txtTues;
	  $txtWed;
	  $txtThur;
	  $txtFri;
	  $txtSat;
	  
	  while ($row = mysqli_fetch_assoc($retval)) {
        if ($currentUsr == $row['User'])
        {
		   $txtSun = $row['Sun'];
		   $txtMon = $row['Mon'];
		   $txtTues = $row['Tues'];
		   $txtWed = $row['Wed'];
		   $txtThur = $row['Thur'];
		   $txtFri = $row['Fri'];
		   $txtSat = $row['Sat'];
           break;
        }
	  }

?>

<H1 class="header1"><B>My Weekly Schedule</B></H1>

<table class="testTable">
	<thead>
		<tr>
			<th colspan="2"><u>Current User:</u> <i><?php echo $currentUsr ?></i></th>
		</tr>
		<tr>
			<th>Weekday</th>
			<th>Scheduled Time</th>
		</tr>
	</thead>
	
	<tr>
		<td>Sunday</td>
		<td><i>Off</i></td>
	</tr>
	<tr>
		<td>Monday</td>
		<td><?php echo $txtMon ?></td>
	</tr>
	<tr>
		<td>Tuesday</td>
		<td><?php echo $txtTues ?></td>
	</tr>
	<tr>
		<td>Wednesday</td>
		<td><?php echo $txtWed ?></td>
	</tr>
	<tr>
		<td>Thursday</td>
		<td><?php echo $txtThur ?></td>
	</tr>
	<tr>
		<td>Friday</td>
		<td><?php echo $txtFri ?></td>
	</tr>
	<tr>
		<td>Saturday</td>
		<td><i>Off</i></td>
	</tr>
	
</table>
	

<?php
      mysqli_close($con);
?>
</body>