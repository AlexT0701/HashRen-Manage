<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hashren | Time Management</title>
  <link rel="stylesheet" href="hrHomepage.css">
  <link rel="stylesheet" href="empM.css">
</head>

<body>
<div class="header">
  <a href="hrHomepage.php" class="logo">HashRen Manage</a>
  <div class="header-right">
    <a href="hrAbout.php">About</a>
    <a href="loginTest.php">Logout</a>
  </div>
</div>

<p></p>
<p></p>

<?php
	// database connection code
    $servername = "localhost";
    $username = "hashren9_james";
    $password = "Mordor72!";
    $databasename = "hashren9_myDB";
?>
	
	<div class="header1">
		<h1>Time Management</h1>
	</div>
	
	<table class="testTable">
		<thead>
			<tr>
				<th>User</th>
				<th>Sunday</th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
				<th>Saturday</th>
			</tr>
		</thead>
<?php
   // Store connection parameters into $con
	$con = mysqli_connect($servername, $username, $password, $databasename);
		
	 // Check if we can connect to server
    if ($con === false) {
      die('Could not connect to server: ' .mysqli_error());
    }
    
    // Select User, Sun, Mon, Tues... columns from the tbl_availability table in the database
    $query = "SELECT User, Sun, Mon, Tues, Wed, Thur, Fri, Sat FROM tbl_availability";
    // Open connection to the MYSQL database using mysqli query
    $retval = mysqli_query($con, $query);
	
   // Check if we can connect to server
	if ($retval === false) {
		die('Could not get data: ' .mysqli_error());
	}
   
   // While loop to go through all entries in the tbl_availability table and display each value in each column
	while($row = mysqli_fetch_assoc($retval)) { ?>
		<tr>
			<td><?php echo $row['User']; ?></td>
            <td><?php echo $row['Sun']; ?></td>
			<td><?php echo $row['Mon']; ?></td> 
			<td><?php echo $row['Tues']; ?></td> 
			<td><?php echo $row['Wed']; ?></td>
			<td><?php echo $row['Thur']; ?></td> 
			<td><?php echo $row['Fri']; ?></td> 
			<td><?php echo $row['Sat']; ?></td>
        </tr>
    <?php }
	
	// get the post records
    $txtName;
    $txtSun;
    $txtMon;
    $txtTues;
    $txtWed;
    $txtThurs;
    $txtFri;
    $txtSun;
    
    // Close connection to the database
    mysqli_close($con);
	?>
	</table>
	
	<p></p>
	<p></p>
	<p></p>
	
	<div class="buttonForm">
		<form id="edit-form" method="post" action="addTime.php">
			<input type="submit" name="add" id="Add" value="Add">
		</form>
		<form id="add-form" method="post" action="editTime.php">
			<input type="submit" name="edit" id="Edit" value="Edit">
		</form>
		<form id="rem-form" method="post" action="remTime.php">
			<input type="submit" name="remove" id="Remove" value="Remove">
		</form>
	</div>
	</body>
</html>
