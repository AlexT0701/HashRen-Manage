<?php
	// database connection code
      // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
      $servername = "localhost";
      $username = "hashren9_james";
      $password = "Mordor72!";
      $databasename = "hashren9_myDB";

      $con = mysqli_connect($servername, $username, $password, $databasename);

      // get the post records
	  $txtPos = $_POST['txtPos'];
      $txtName = $_POST['txtName'];
      $txtAdd = $_POST['txtAdd'];
      $txtCit = $_POST['txtCit'];
      $txtStat = $_POST['txtStat'];
      $txtZip = $_POST['txtZip'];
	  $txtCell = $_POST['txtCell'];
      $txtMail = $_POST['txtMail'];
      
      /*echo "$txtPos <Br>";
      echo "$txtName <Br>";
      echo "$txtAdd <Br>";
      echo "$txtCit <Br>";
      echo "$txtStat <Br>";
      echo "$txtZip <Br>";
	  echo "$txtCell <Br>";
      echo "$txtZMail <Br>";*/
	  
      // database insert SQL code
      $sql = "INSERT INTO `tbl_applications` (`Name`, `Num`, `Addr`, `City`, `State`, `Zip`, `Email`, `Pos`) VALUES ('$txtName', '$txtCell', '$txtAdd', '$txtCit', '$txtStat', '$txtZip', '$txtMail', '$txtPos')";

      // insert in database
      $rs = mysqli_query($con, $sql);

      if($rs)
      {
         echo "Application has Successfully been sent.";
      }
      mysqli_close($con);
?>