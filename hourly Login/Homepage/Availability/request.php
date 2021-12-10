<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen | Set Availability</title>
  <link rel="stylesheet" href="homepage.css">
  <link rel="stylesheet" href="request.css">
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

<H1 class="header1"><B>Set Availability Form</B></H1>

<div class="setADiv">
    <form name="setAv" method="post">
	
	<table class="testTable">
	<thead>
		<tr>
			<th colspan="2"><u>Availability Form</u> <i><?php echo $currentUsr ?></i></th>
		</tr>
	</thead>
	<tr>
		<td><label for="name">Name</label></td>
		<td><input type="text" name="txtName" id="txtName" placeholder="Employee Name" required></td>
	</tr>
	<tr>
		<td><label for="sun">Sunday Availability </label></td>
		<td><input type="text" name="txtSun" id="txtSun" placeholder="Work Hours" ></td>
	</tr>
	<tr>
		<td><label for="mon">Monday Availability</label></td>
		<td><input type="text" name="txtMon" id="txtMon" placeholder="Work Hours" ></td>
	</tr>
	<tr>
		<td><label for="tues">Tuesday Availability</label></td>
		<td><input type="text" name="txtTues" id="txtTues" placeholder="Work Hours" ></td>
	</tr>
	<tr>
		<td><label for="wed">Wednesday Availability</label></td>
		<td><input type="text" name="txtWed" id="txtWed" placeholder="Work Hours" ></td>
	</tr>
	<tr>
		<td><label for="thurs">Thursday Availability</label></td>
		<td><input type="text" name="txtThurs" id="txtThurs" placeholder="Work Hours" ></td>
	</tr>
	<tr>
		<td><label for="fri">Friday Availability</label></td>
		<td><input type="text" name="txtFri" id="txtFri" placeholder="Work Hours" ></td>
	</tr>
	<tr>
		<td><label for="sat">Saturday Availability</label></td>
		<td><input type="text" name="txtSat" id="txtSat" placeholder="Work Hours" ></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="Submit" id="Submit" value="Submit"></td>
	</tr>
	</table>
    </form>
	</div>

<?php
   if (isset($_POST['Submit']))
   {
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
      
      // Select User column from the tbl_requests table in the database
      $query = "SELECT User FROM tbl_requests";
      // Open connection to the MYSQL database using mysqli query
      $retval = mysqli_query($con, $query);
      
      // Check if we can connect to server
      if ($retval === false) {
        die('Could not get data: ' .mysqli_error());
      }
      else {
        //echo "Data Retrieved: <br>";
      }
      
      // Variables initialized from the php post method input
      $usr = $_POST['txtName'];
      $txtSun = $_POST['txtSun'];
      $txtMon = $_POST['txtMon'];
      $txtTues = $_POST['txtTues'];
      $txtWed = $_POST['txtWed'];
      $txtThurs = $_POST['txtThurs'];
      $txtFri = $_POST['txtFri'];
      $txtSat = $_POST['txtSat'];
      // Counter to count the number of days set
      $dayCount = 0;
	  
     // While loop to go through all entries in the tbl_userInfo table
	  while ($row = mysqli_fetch_assoc($retval)) {
        // Test to see if the entered name exists in the database
        if ($usr == $row['User'])
        {
           // Boolean is set to true if user exists
           $exists = "True";
           // Break out of the loop
           break;
        }
      }
	  
     // Test to see if the boolean was set to true
	  if ($exists == "True")
	  {
        // Test to see if the sunday field is empty
        if ($txtSun != "")
        {
          // Update Sun column in the tbl_requests table in the database
          $q = "UPDATE tbl_requests SET Sun ='$txtSun' WHERE User='$usr'";
          // Open connection to the MYSQL database using mysqli query
          $r = mysqli_query($con, $q);
          // Increment the days entered counter
          $dayCount += 1;
          // Display message saying that sunday has been set and must contact upper management
          echo "Request has been submitted, but must discuss with upper management for Sunday to be accepted. <Br>";
        }
        
        // Test to see if Monday field is empty
        if ($txtMon != "")
        {
          // Update Mon column in the tbl_requests table in the database
          $q = "UPDATE tbl_requests SET Mon ='$txtMon' WHERE User='$usr'";
          // Open connection to the MYSQL database using mysqli query
          $r = mysqli_query($con, $q);
          // Increment the days entered counter
          $dayCount += 1;
        }
        
        // Test to see if Tuesday field is empty
        if ($txtTues != "")
        {
          // Update Tues column in the tbl_requests table in the database
          $q = "UPDATE tbl_requests SET Tues ='$txtTues' WHERE User='$usr'";
          // Open connection to the MYSQL database using mysqli query
          $r = mysqli_query($con, $q);
          // Increment the days entered counter
          $dayCount += 1;
        }
        
        // Test to see if Wednesday field is empty
        if ($txtWed != "")
        {
          // Update Wed column in the tbl_requests table in the database
          $q = "UPDATE tbl_requests SET Wed ='$txtWed' WHERE User='$usr'";
          // Open connection to the MYSQL database using mysqli query
          $r = mysqli_query($con, $q);
          // Increment the days entered counter
          $dayCount += 1;
        }
        
        // Test to see if Thursday field is empty
        if ($txtThurs != "")
        {
          // Update Thur column in the tbl_requests table in the database
          $q = "UPDATE tbl_requests SET Thur ='$txtThurs' WHERE User='$usr'";
          // Open connection to the MYSQL database using mysqli query
          $r = mysqli_query($con, $q);
          // Increment the days entered counter
          $dayCount += 1;
        }
        
        // Test to see if Friday field is empty
        if ($txtFri != "")
        {
          // Update Fri column in the tbl_requests table in the database
          $q = "UPDATE tbl_requests SET Fri ='$txtFri' WHERE User='$usr'";
          // Open connection to the MYSQL database using mysqli query
          $r = mysqli_query($con, $q);
          // Increment the days entered counter
          $dayCount += 1;
        }
        
        // Test to see if Saturday field is empty
        if ($txtSat != "")
        {
          // Update Sat column in the tbl_requests table in the database
          $q = "UPDATE tbl_requests SET Sat ='$txtSat' WHERE User='$usr'";
          // Open connection to the MYSQL database using mysqli query
          $r = mysqli_query($con, $q);
          // Increment the days entered counter
          $dayCount += 1;
          // Display message saying that saturday has been set and must contact upper management
          echo "Request has been submitted, but must discuss with upper management for Saturday to be accepted. <Br>";
        }
        
        // Test to see if the day counter is equal to 7
        if ($dayCount == 7)
        {
           // Display message to contact upper management
           echo "Please contact upper management to discuss set availability. Too many days have been requested <Br>";
        }
        else if ($dayCount < 4) // tst to see if day counter is less than 4
        {
           // Display message to contact upper management
           echo "Please contact upper management to discuss set availability. Too few number of days have been requested <Br>";
        }
        else
        {
           // Display that the availability has been set
           echo "Availability has been set <br>";
        }
	  }
	  else // boolean is not set to true
	  {
        // Display error message
		  echo "Must be on the employee schedule to set availability <Br>";
	  }
     // Close connection to database
     mysqli_close($con);
   }
?>