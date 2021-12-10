<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen | My Department</title>
  <link rel="stylesheet" href="homepage.css">
  <link rel="stylesheet" href="department.css">
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
     
     // Select first, last, email, and pos column from the tbl_department table in the database
     $query = "SELECT first, last, email, pos FROM tbl_department";
     // Open connection to the MYSQL database using mysqli query
     $retval = mysqli_query($con, $query);
     
     if ($retval === false) {
        die('Could not get data: ' .mysqli_error());
     }
     else {
        //echo "Data Retrieved: <br>";
     }
	  
     // Variables that will store the values from each column of the tbl_department table
	  $name;
     $last;
	  $mail;
	  $pos;
     $sun;
     $mon;
     $tues;
     $wed;
     $thur;
     $fri;
     $sat;
	  ?>
	  <H1 class="header1"><B>My Department</B></H1>
	  <?php
     // While loop to go through all entries in the tbl_department table
	  while ($row = mysqli_fetch_assoc($retval)) {
        // Test to see if the current user does not the current index of the database table
        if ($currentUsr != $row['last'])
        {
           // Set the variables equal to the values of each column in the table
           $name = $row['first'];
           $last = $row['last'];
           $mail = $row['email'];
           $pos = $row['pos'];
		?>
		<div class="alignmentDiv">
		<div class="tableDiv">
		<table class="testTable">
			<thead>
				<tr>
					<th colspan="2" style="text-align: left;"><u>Employee:</u> <i><?php echo $name ?><?php echo " " ?><?php echo $last ?></i></th>
				</tr>
				<tr>
					<th colspan="2" style="text-align: left;"><u>Email:</u> <i><?php echo $mail ?></i></th>
				</tr>
				<tr>
					<th colspan="2" style="text-align: left;"><u>Position:</u> <i><?php echo $pos ?></i></th>
				</tr>
		</thead>
        <?php
           // Select User, Sun, Mon, Tues... columns from the tbl_availability table in the database
           $q = "SELECT User, Sun, Mon, Tues, Wed, Thur, Fri, Sat FROM tbl_availability";
           // Open another connection to the MYSQL database using mysqli query
           $r = mysqli_query($con, $q);
           // While loop to go through all entries in the tbl_availability table
           while ($row = mysqli_fetch_assoc($r))
           {
              // Test to see if the name of the current employee index from the tbl_department table matches the index of 
              // the User column in the tbl_availability table
              if ($name == $row['User'])
              {
                 // Set the variables equal to the values of each column in the table
                 $sun = $row['Sun'];
                 $mon = $row['Mon'];
                 $tues = $row['Tues'];
                 $wed = $row['Wed'];
                 $thur = $row['Thur'];
                 $fri = $row['Fri'];
                 $sat = $row['Sat'];
                 break;
              }
           }
		   ?>
				<tr>
					<td>Sunday</td>
					<td><i>Off</i></td>
				</tr>
				<tr>
					<td>Monday</td>
					<td><?php echo $mon ?></td>
				</tr>
				<tr>
					<td>Tuesday</td>
					<td><?php echo $tues ?></td>
				</tr>
				<tr>
					<td>Wednesday</td>
					<td><?php echo $wed ?></td>
				</tr>
				<tr>
					<td>Thursday</td>
					<td><?php echo $thur ?></td>
				</tr>
				<tr>
					<td>Friday</td>
					<td><?php echo $fri ?></td>
				</tr>
				<tr>
					<td>Saturday</td>
					<td><i>Off</i></td>
				</tr>
	
		</table>
		</div>
		</div>
		<p></p>
		<?php
        }
     }
     

?>

<?php
// Close the mysqli connection to the database
      mysqli_close($con);
?>