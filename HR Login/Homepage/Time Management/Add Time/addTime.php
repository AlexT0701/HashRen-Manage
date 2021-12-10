<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Employee Schedule</title>
  <link rel="stylesheet" href="hrHomepage.css">
  <link rel="stylesheet" href="addEmp.css">
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

<body>
  <fieldset>
    <legend>Employee Form</legend>
    <form name="addEmployee" method="post">
      <p>
        <label for="name">Employee Name</label>
        <input type="text" name="txtName" id="txtName" placeholder="Employee Name" >
      </p>
      <p>
        <label for="sun">Sunday Availability </label>
        <input type="text" name="txtSun" id="txtSun" placeholder="Work Hours" >
      </p>
      <p>
        <label for="mon">Monday Availability</label>
        <input type="text" name="txtMon" id="txtMon" placeholder="Work Hours" >
      </p>
      <p>
        <label for="tues">Tuesday Availability</label>
        <input type="text" name="txtTues" id="txtTues" placeholder="Work Hours" >
      </p>
      <p>
        <label for="wed">Wednesday Availability</label>
        <input type="text" name="txtWed" id="txtWed" placeholder="Work Hours" >
      </p>
      <p>
        <label for="thurs">Thursday Availability</label>
        <input type="text" name="txtThurs" id="txtThurs" placeholder="Work Hours" >
      </p>
      <p>
        <label for="fri">Friday Availability</label>
        <input type="text" name="txtFri" id="txtFri" placeholder="Work Hours" >
      </p>
      <p>
        <label for="sat">Saturday Availability</label>
        <input type="text" name="txtSat" id="txtSat" placeholder="Work Hours" >
      </p>
      <p>&nbsp;</p>
      <p>
        <input type="submit" name="Submit" id="Submit" value="Submit">
      </p>
    </form>
  </fieldset>
</body>
</html>

<?php
   if (isset($_POST['Submit']))
   {
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

      $query = "SELECT fldName FROM tbl_userInfo";
      $retval = mysqli_query($con, $query);

      if ($retval === false) {
        die('Could not get data: ' .mysqli_error());
      }
      else {
        //echo "Data Retrieved: <br>";
      }

      // get the post records
      $name = $_POST['txtName'];
      $exists = "False";

      while ($row = mysqli_fetch_assoc($retval)) {
        if ($name == $row['fldName'])
        {
			//echo "In while loop <Br>";
           $exists = "True";
           break;
        }
      }

      if ($exists == "True")
      {
        $txtSun = $_POST['txtSun'];
        $txtMon = $_POST['txtMon'];
        $txtTues = $_POST['txtTues'];
        $txtWed = $_POST['txtWed'];
        $txtThurs = $_POST['txtThurs'];
        $txtFri = $_POST['txtFri'];
        $txtSat = $_POST['txtSat'];

        // Insert into availability table
        $sql = "INSERT INTO `tbl_availability` (`User`, `Sun`, `Mon`, `Tues`, `Wed`, `Thur`, `Fri`, `Sat`) VALUES ('$name', '$txtSun', '$txtMon', '$txtTues', '$txtWed', '$txtThurs', '$txtFri', '$txtSat')";

        // insert in database
        $rs = mysqli_query($con, $sql);
		
		// Also insert into requests table
        //$s = "INSERT INTO `tbl_requests` (`User`) VALUES ('$name')";

        // insert in database
        //$r = mysqli_query($con, $s);

        if($rs)
        {
           echo "Employee Information Successfully Recorded";
        }
		//echo "Inserted";
      }
      else
      {
        echo "Please enter a current employee name <Br>";
      }


      /*echo "$txtId <Br>";
      echo "$txtUser <Br>";
      echo "$txtPass <Br>";
      echo "$txtName <Br>";
      echo "$txtPosition <Br>";*/

      mysqli_close($con);
   }
?>
