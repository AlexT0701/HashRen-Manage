<!DOCTYPE html>
<html lang="en">

<!-- <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen Login</title>
  <link rel="stylesheet" href="test.css">
</head> -->

<div class="login">
  <h1>Hashren Login</h1>
  <link rel="stylesheet" href="del.css">
    <form method="post">
      <input type="text" name="uname" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <input type="submit" name="submit" value="login"class="btn btn-primary btn-block btn-large"></button>
    </form>
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
        $sql = "Select User FROM tbl_current ";
        // Open connection to the MYSQL database using mysqli query
        $rs = mysqli_query($con, $sql);
        
        // Variable that will hold the value of the user column in tbl_current table
        $cur;
        
		// While loop to go through all entries in the tbl_current table
		while ($row = mysqli_fetch_assoc($rs))
		{
         // Set current user equal to the value of user column in tbl_current
			$cur = $row['User'];
			// DELETE User from the tbl_current table in the database
			$sql = "DELETE FROM tbl_current WHERE User='$cur'";
			// Open connection to the MYSQL database using mysqli query
			$rs = mysqli_query($con, $sql);
		}
      // Close connection to database
		mysqli_close($con);
?>


   
   <?php
      if (isset($_POST['submit'])) {
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
        
        // Select ID, fldUser, fldPass... columns from the tbl_userInfo table in the database
        $query = "SELECT ID, fldUser, fldPass, fldName, fldPosition FROM tbl_userInfo";
        // Open connection to the MYSQL database using mysqli query
        $retval = mysqli_query($con, $query);
        
        // Check if we can connect to server
        if ($retval === false) {
          die('Could not get data: ' .mysqli_error());
        }
        else {
          //echo "Data Retrieved: <br><br>";
        }
        
        // variables initialized from the php post method
        $name = mysqli_real_escape_string($con, $_POST['uname']);
        $pass = mysqli_real_escape_string($con, $_POST['password']);
        
        // While loop to go through all entries in the tbl_userInfo table
        while ($row = mysqli_fetch_assoc($retval)) {
           // Test to see if the entered username and password match entries in the database
           if ($name == $row['fldUser'] && $pass == $row['fldPass'])
           {
            // Test to see if user is an hourly employee  
            if ($row['ID'] == "0")
            {
               // Inser username into tbl_userInfo table in the database to store the current user
               $q = "INSERT INTO `tbl_current` (`User`) VALUES ('$name')";
               // Open connection to the MYSQL database using mysqli query
               $r = mysqli_query($con, $q);
               // Open the hourly employee homepage
               echo "<script>window.location.href='homepage.php';</script>";
               // Exit loop
               exit;
               // Go to end
               goto end;
            }
            else if ($row['ID'] == "1") // Test to see if user is an upper management employee
            {
               // Inser username into tbl_userInfo table in the database to store the current user
               $q = "INSERT INTO `tbl_current` (`User`) VALUES ('$name')";
               // Open connection to the MYSQL database using mysqli query
               $r = mysqli_query($con, $q);
               // Open the hr employee homepage
               echo "<script>window.location.href='hrHomepage.php';</script>";
               // Exit loop
               exit;
               // Go to end
               goto end;
            }
            else // Guard clause
            {
               // do nothing
            }
           }
        }
        // Display login error page
        echo "<script>window.location.href='loginError.php';</script>";
        exit;
        
        // Close connection to database
        mysqli_close($con);
       end: 
     }
  ?>
   
