<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen Login</title>
  <link rel="stylesheet" href="hrHomepage.css">
  <link rel="stylesheet" href="onboard.css">
</head>

<body>
<div class="header">
  <a href="hrHomepage.php" class="logo">HashRen Manage</a>
  <div class="header-right">
    <a href="hrAbout.php">About</a>
    <a href="loginTest.php">Logout</a>
  </div>
</div>

<H1 class="header1"><B>Candidate Applications</B></H1>

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
	
   // Select Name, Num, Addr... columns from the tbl_applications table in the database
	$query = "SELECT Name, Num, Addr, City, State, Zip, Email, Pos FROM tbl_applications";
   // Open connection to the MYSQL database using mysqli query
	$retval = mysqli_query($con, $query);
	
   // Check if we can connect to server
	if ($retval === false) {
		die('Could not get data: ' .mysqli_error());
	}
	
   // While loop to go through all entries in the tbl_applications table
	while($row = mysqli_fetch_assoc($retval))
	{
      // Initialize variables from the values of each column from tbl_applications table
      $position = $row['Pos'];
      $name = $row['Name'];
      $address = $row['Addr'];
      $city = $row['City'];
      $state = $row['State'];
      $zip = $row['Zip'];
      $cell = $row['Num'];
      $email = $row['Email']; 
?> 
<p></p>
<p></p>
<div class="tableDiv">
<form action="//submit.form" id="EmploymentApplication100" method="post" onsubmit="return ValidateForm(this);">

<table class="onboardTable" border="0" cellpadding="5" cellspacing="0">
	<tr> 
	<td colspan="2">
		<label for="Full_Name"><b>Full name</b></label><br />
		<input name="Full_Name" type="text" maxlength="100" value='<?php echo $name ?>' style="width:100%;max-width: 535px" />
	</td>
	</tr> <tr> 
	<td colspan="2">
		<label for="Email_Address"><b>Email</b></label><br />
		<input name="Email_Address" type="text" maxlength="100" value='<?php echo $email ?>' style="width:100%;max-width: 535px" />
	</td> 
	</tr> <tr> 
	<td colspan="2">
		<label for="Position"><b>Position applied for</b></label><br />
		<input name="Position" type="text" maxlength="255" value='<?php echo $position ?>' style="width:100%;max-width: 535px" />
	</td> 
	</tr> <tr> 
	<td colspan="2">
		<label for="Address"><b>Address</b></label><br />
		<input name="Address" type="text" maxlength="100" value='<?php echo $address ?>' style="width:100%;max-width: 535px" />
	</td> 
	</tr> <tr> 
	<td colspan="2">
		<label for="CityStateZip"><b>City, State Zip</b></label><br />
		<input name="CityStateZip" type="text" maxlength="100" value='<?php echo $city; echo ", "; echo $state; echo " "; echo $zip;?>' style="width:100%;max-width: 535px" />
	</td>
	
	</tr> <tr> 
	<td>
		<label for="Phone"><b>Phone</b></label><br />
		<input name="Phone" type="text" maxlength="50" value='<?php echo $cell ?>' style="width:100%;max-width: 260px" />
	</td> <td>
		<label for="SecondPhone"><b>Secondary Phone</b></label><br />
		<input name="SecondPhone" type="text" maxlength="50" value="none" style="width:100%;max-width: 260px" />
	</td> 
	</tr> <tr> 
	
	</tr> <tr> 
	<td colspan="2">
		<label for="Organization"><b>Last company you worked for</b></label><br />
		<input name="Organization" type="text" maxlength="100" value="N/A"style="width:100%;max-width: 535px" />
	</td> 
	</tr> <tr> 
	<td colspan="2">
		<label for="Reference"><b>Reference / Comments / Questions</b></label><br />
		<textarea name="Reference" rows="7" cols="40" style="width:100%;max-width: 400px"></textarea>
	</td> 
	</tr>
</table>
</form>
</div>
<?php
}
// Close connection to the database
mysqli_close($con);
?>