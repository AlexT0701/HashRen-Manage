<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen Login</title>
  <link rel="stylesheet" href="hrHomepage.css">
  <link rel="stylesheet" href="empM.css">
  <link rel="stylesheet" href="request.css">
</head>

<body>
<div class="header">
  <a href="hrHomepage.php" class="logo">HashRen Manage</a>
  <div class="header-right">
    <a href="hrAbout.php">About</a>
    <a href="loginTest.php">Logout</a>
  </div>
</div>

<p>
</p>
<p>
</p>

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

      $query = "SELECT User, msg, Sun, Mon, Tues, Wed, Thur, Fri, Sat FROM tbl_requests";
      $retval = mysqli_query($con, $query);

      if ($retval === false) {
        die('Could not get data: ' .mysqli_error());
      }
      else {
        //echo "Data Retrieved: <br>";
      }
	  
	  $msg;


?>

<H1 class="header1">Employee HR Requests & Ticket Submissions</H1>

<H2 class="subHeader1"><u><i>HR Tickets</i></u></H2>

<table class="ticketTable">

	<thead>
		<tr>
			<th>Employee Name</th>
			<th>Ticket</th>
		</tr>
    </thead>
   
    <?php 
	$con = mysqli_connect($servername, $username, $password, $databasename);
	
	if ($con === false) {
		die('Could not connect to server: ' .mysqli_error());
	}
	
	$query = "SELECT User, msg, Sun, Mon, Tues, Wed, Thur, Fri, Sat FROM tbl_requests";
	$retval = mysqli_query($con, $query);
	
	if ($retval === false) {
		die('Could not get data: ' .mysqli_error());
	}
	
	while($row = mysqli_fetch_assoc($retval)) { ?>
	
		<?php
		$msg = $row['msg'];
	
		
		if ($msg != "")
		{
			?>
			<tr>
				<td><?php echo $row['User'] ?></td>
				<td><?php echo $row['msg']; ?></td>
			</tr>
		
		<?php
		} else {
			?>
			<tr>
				<td><?php echo $row['User'] ?></td>
				<td><?php echo "[No Explanation Provided]"; ?></td>
			</tr>
			<?php
		}
		?>
		
    <?php }
	?>
 </table>
 
 <!-- ************************************************************************** -->
 <p></p>
 <p></p>
 
 <H2 class="subHeader1"><u><i>Availability Requests</i></u></H2>
 
 <table class="testTable">

	<thead>
		<tr>
			<th>Employee Name</th>
			<th>Request Type</th>
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
	$con = mysqli_connect($servername, $username, $password, $databasename);
	
	if ($con === false) {
		die('Could not connect to server: ' .mysqli_error());
	}
	
	$query = "SELECT User, msg, Sun, Mon, Tues, Wed, Thur, Fri, Sat FROM tbl_requests";
	$retval = mysqli_query($con, $query);
	
	if ($retval === false) {
		die('Could not get data: ' .mysqli_error());
	}
	
	while($row = mysqli_fetch_assoc($retval)) { ?>
	
		<?php
		$msg = $row['msg'];
	
		
		if ($msg != "")
		{
			?>
			<tr>
				<td><?php echo $row['User'] ?></td>
				<td><?php echo "Availability Change"; ?></td>
				<td><?php echo $row['Sun']; ?></td> 
				<td><?php echo $row['Mon']; ?></td> 
				<td><?php echo $row['Tues']; ?></td>
				<td><?php echo $row['Wed']; ?></td> 
				<td><?php echo $row['Thur']; ?></td> 
				<td><?php echo $row['Fri']; ?></td> 
				<td><?php echo $row['Sat']; ?></td> 
			</tr>
		
		<?php
		} else {
			?>
			<tr>
				<td><?php echo $row['User'] ?></td>
				<td><?php echo "Availability Change"; ?></td>
				<td><?php echo $row['Sun']; ?></td> 
				<td><?php echo $row['Mon']; ?></td> 
				<td><?php echo $row['Tues']; ?></td>
				<td><?php echo $row['Wed']; ?></td> 
				<td><?php echo $row['Thur']; ?></td> 
				<td><?php echo $row['Fri']; ?></td> 
				<td><?php echo $row['Sat']; ?></td> 
			</tr>
			<?php
		}
		?>
		
    <?php }
	mysqli_close($con);
	?>
 </table>