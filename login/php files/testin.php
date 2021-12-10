<?php
  // database connection code
  $servername = "localhost";
  $username = "hashren9_james";
  $password = "Mordor72!";
  $databasename = "hashren9_myDB";

  $con = mysqli_connect($servername, $username, $password, $databasename);

  // Check if we can connect to server
  if ($con === false) {
    die('Could not connect to server: ' .mysqli_error());
  }

  $query = "SELECT ID, fldUser, fldPass, fldName, fldPosition FROM tbl_userInfo";
  $retval = mysqli_query($con, $query);

  if ($retval === false) {
    die('Could not get data: ' .mysqli_error());
  }
  else {
    //echo "Data Retrieved: <br><br>";
  }

  $name = mysqli_real_escape_string($con, $_POST['uname']);
  $pass = mysqli_real_escape_string($con, $_POST['password']);

  //echo " Entered: $name <br>";
  //echo " Entered: $pass <br><br>";

  //echo " Testing database entries: <br>";

  while ($row = mysqli_fetch_assoc($retval)) {

	  //echo "{$row['fldUser']} <br>";
	  //echo "{$row['fldPass']} <br>";

	  if ($name == $row['fldUser'] && $pass == $row['fldPass'])
	  {
		//echo "Match <br>";
		if ($row['ID'] == "0")
            {
				$q = "INSERT INTO `tbl_current` (`User`) VALUES ('$name')";
				$r = mysqli_query($con, $q);
               echo "<script>window.location.href='homepage.php';</script>";
               exit;
               goto end;
            }
            else if ($row['ID'] == "1")
            {
				$q = "INSERT INTO `tbl_current` (`User`) VALUES ('$name')";
				$r = mysqli_query($con, $q);
               echo "<script>window.location.href='hrHomepage.php';</script>";
               exit;
               goto end;
            }
            else
            {
               // do nothing
            }
      //break;
      //echo "<script>window.location.href='homepage.php';</script>";
      //exit;
      //goto end;
		//header(“location: http://www.mysite.com/index.php?pop=yes 1.4k”);
    //exit;
		//break;
	  }
  }
  echo "<script>window.location.href='loginError.php';</script>";
  exit;

  //echo "no match";

  /*while ($row = mysqli_fetch_assoc($retval)) {
    echo "Emp ID: {$row['ID']} <br>".
          "Emp User: {$row['fldUser']} <br>".
          "Emp Pass: {$row['fldPass']} <br>".
          "Emp Name: {$row['fldName']} <br>".
          "Emp Position: {$row['fldPosition']} <br>".
          "----------------------------------<br>";
  }*/

  mysqli_close($con);
 end:
 ?>
