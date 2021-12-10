<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen | My Account</title>
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

<?php
      // database connection code
      $servername = "localhost";
      $username = "hashren9_james";
      $password = "Mordor72!";
      $databasename = "hashren9_myDB";
      
      // Store connection parameters into $con
      $con = mysqli_connect($servername, $username, $password, $databasename);

      // Check if we can connect to server
      if ($con === false) {
        die('Could not connect to server: ' .mysqli_error());
      }
      
      // Select User column from the tbl_current table in the database
      $query = "SELECT User FROM tbl_current";
      // Open connection to the MYSQL database using mysqli query
      $retval = mysqli_query($con, $query);
	  
     // Variable to hold the current user
	  $currentUsr;
	  
     // While loop to go through all entries in the tbl_current table
	  while ($row = mysqli_fetch_assoc($retval)) {
        // There should only be one entry so set the value of the User column to current user
        $currentUsr = $row['User'];
	  }
     
     // Select ID, fldUser, fldPass, fldName, and fldPosition columns from the tbl_userInfo table in the database
     $query = "SELECT ID, fldUser, fldPass, fldName, fldPosition FROM tbl_userInfo";
     // Open connection to the MYSQL database using mysqli query
     $retval = mysqli_query($con, $query);
     
     // Check if we can connect to server
     if ($retval === false) {
       die('Could not get data: ' .mysqli_error());
     }
     else {
        //echo "Data Retrieved: <br>";
     }
	  
     // Variables that will store the values from each column of the tbl_userInfo table
	  $id;
	  $usr;
	  $pass;
	  $name;
	  $pos;
	  
     // While loop to go through all entries in the tbl_userInfo table
	  while ($row = mysqli_fetch_assoc($retval)) {
        // Check if the currentUser matches the current index of the table
        if ($currentUsr == $row['fldUser'])
        {
           // Set the variables equal to the values of each column in the table
           $id = $row['ID'];
           $usr = $row['fldUser'];
           $pass = $row['fldPass'];
           $name = $row['fldName'];
           $pos = $row['fldPosition'];
           // Break out of the while loop
           break;
        }
	  }
     // Close mysqli query connection to the database
  ?>

<H1 class="header1"><B>My Account</B></H1>

<table class="testTable">
	<thead>
		<tr>
			<th colspan="2"><u>Employee Information</u></th>
		</tr>
	</thead>
	
	<tr>
		<td>ID Type:</td>
		<td><?php echo $id ?></td>
	</tr>
	<tr>
		<td>Username:</td>
		<td><?php echo $usr ?></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td>*****</td>
	</tr>
	<tr>
		<td>Name:</td>
		<td><?php echo $name ?></td>
	</tr>
	<tr>
		<td>Position:</td>
		<td><?php echo $pos ?></td>
	</tr>
	
</table>
	

<?php
      mysqli_close($con);
?>