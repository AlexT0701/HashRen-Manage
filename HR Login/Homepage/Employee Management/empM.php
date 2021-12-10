<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hashren | Employee Form</title>
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

<H1 class="header1"><B>Employee Management</B></H1>

<table class="testTable">
    <thead>
		<tr>
			<th>Emp ID</th>
			<th>Emp Name</th>
			<th>Emp User</th>
			<th>Emp Pass</th>
			<th>Emp Position</th>
		</tr>
    </thead>
<?php 
    
   // Store connection parameters into $con 
	$con = mysqli_connect($servername, $username, $password, $databasename);
	
   // Check if we can connect to server
	if ($con === false) {
		die('Could not connect to server: ' .mysqli_error());
	}
	
   // Select ID, fldUser, fldPass... columns from the tbl_userInfo table in the database
	$query = "SELECT ID, fldUser, fldPass, fldName, fldPosition FROM tbl_userInfo";
   // Open connection to the MYSQL database using mysqli query
	$retval = mysqli_query($con, $query);
	
   // Check if we can connect to server
	if ($retval === false) {
		die('Could not get data: ' .mysqli_error());
	}
	
   // While loop to go through all entries in the tbl_userInfo table and display each value of each column
	while($row = mysqli_fetch_assoc($retval)) { ?>
        <tr>
            <td><?php echo $row['ID'] ?></td>
            <td><?php echo $row['fldName']; ?></td>
			<td><?php echo $row['fldUser']; ?></td> 
			<td>********</td> 
			<td><?php echo $row['fldPosition']; ?></td> 
        </tr>
<?php }
    // Close connection to the database
    mysqli_close($con);
	?>
 </table>

<p></p>
<p></p>
<p></p>

<div class="buttonForm">
	<form id="add-form" method="post" action="addEmp.php">
		<input type="submit" name="Add" id="Add" value="Add">
	</form>
	<form id="edit-form" method="post" action="editEmp.php">
		<input type="submit" name="edit" id="Edit" value="Edit">
	</form>
	<form id="remove-form" method="post" action="remEmp.php">
		<input type="submit" name="Remove" id="Remove" value="Remove">
	</form>
</div>
</html>