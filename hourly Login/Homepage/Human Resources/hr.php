<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen | myHR</title>
  <link rel="stylesheet" href="homepage.css">
  <link rel="stylesheet" href="hr.css">
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

    <H1 class="header1"><B>My HR Tickets & Submissions</B></H1>
	
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
	  
     // Select fldUser and fldName columns from the tbl_userInfo table in the database
	  $query = "SELECT fldUser, fldName FROM tbl_userInfo";
     // Open connection to the MYSQL database using mysqli query
     $retval = mysqli_query($con, $query);
	  
     // While loop to go through all entries in the tbl_userInfo table
	  while ($row = mysqli_fetch_assoc($retval)) {
        // Test to see if the current user matches the index of the fldUser in the tbl_userInfo table
		  if ($currentUsr == $row['fldUser'])
		  {
           // Set the current user to the value of fldName
			  $currentUsr = $row['fldName'];
		  }
	  }
     
      // Select User and msg columns from the tbl_requests table in the database
      $query = "SELECT User, msg FROM tbl_requests";
      // Open connection to the MYSQL database using mysqli query
      $retval = mysqli_query($con, $query);
      
      // Check if we can connect to server
      if ($retval === false) {
        die('Could not get data: ' .mysqli_error());
      }
      else {
        //echo "Data Retrieved: <br>";
      }
      
      // Variable to hold the request from the current user
      $msg;
      // Boolean initialized to false
      $exists = "False";
      
      // While loop to go through all entries in the tbl_requests table
      while ($row = mysqli_fetch_assoc($retval)) {
        // Test to see if the current user is equal to the current index in the tbl_requests table
        if ($currentUsr == $row['User'])
        {
           // Set msg to the value of the msg column from the tbl_requests table
           $msg = $row['msg'];
           // Set the boolean to true
           $exists = "True";
           // break out of the while loop
           break;
        }
      }
      
      // Test to see if the boolean was set to true
      if ($exists == "True")
      {
		  // Test to see if msg is not empty
		  if ($msg != "")
		  {
			  ?>
             <table class="testTable">
				<thead>
					<tr>
						<th colspan="2">HR Tickets & Requests</th>
					</tr>
					<tr>
			
					</tr>
				</thead>
					<tr>
						<td>Active Request:</td>
						<td><?php echo $msg ?></td>
					</tr>
			</table>
			<?php
		  }
		  else // msg is empty
		  {
           // Display that there are not current requests
			  echo "There are no current requests <Br>";
			  ?>
			  <table class="testTable">
				<thead>
					<tr>
						<th colspan="2">HR Tickets & Requests</th>
					</tr>
					<tr>
			
					</tr>
				</thead>
					<tr>
						<td>Active Request:</td>
						<td>[There are no active requests]</td>
					</tr>
			</table>
			<?php
		  }
      }
?>

	<p></p>
	<p></p>
  <div class="ticketSubmit">
    <form name="ticket" method="post">
	<h1>Submit New Ticket</h1>
      <p>
        <label for="name">Employee</label>
        <input type="text" name="name" id="name" placeholder="Employee Name" required>
      </p>
      <p>
		<textarea type="text" name="mess" id="mess" placeholder="Explain request here" rows="7" cols="40" style="width:100%;max-width: 400px" required></textarea>
      </p>
      <p>&nbsp;</p>
      <p>
        <input type="submit" name="Send" id="Send" value="Send" style="border-radius:5px;">
      </p>
    </form>
  </div>
</body>
</html>
<?php
// Close connection to the database
      mysqli_close($con);

   if (isset($_POST['Send']))
   {
      // database connection code
      // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
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

      // Initialize the variable from the php post method
      $txtName = $_POST['name'];
      // Boolean initialized to false
      $exists = "False";
      
      // While loop to go through all entries in the tbl_requests table
      while ($row = mysqli_fetch_assoc($retval)) {
        // Test to see if the entered name is in the tbl_requests table
        if ($txtName == $row['User'])
        {
           // Set the boolean to true
           $exists = "True";
           // Break out of the while loop
           break;
        }
      }
      
      // Test to see if the boolean was set to true
      if ($exists == "True")
      {
         // Initialize the variable from the php post method
         $req = $_POST['mess'];
         // Select User column from the tbl_requests table in the database
         $q = "UPDATE tbl_requests SET msg ='$req' WHERE User='$txtName'";
         // Open connection to the MYSQL database using mysqli query
         $r = mysqli_query($con, $q);
      }
      else // boolean was not set to true
      {
         // Display error message
        echo "Please enter a current employee name <Br>";
      }
      
      // Close connection to the database
      mysqli_close($con);
   }
?>