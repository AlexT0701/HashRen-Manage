<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Employee</title>
  <link rel="stylesheet" href="hrHomepage.css">
  <link rel="stylesheet" href="editEmp.css">
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

<div class="empHeader">
	<H1>Employee Edit Form</H1>
</div>

<form id="submit-form" method="post">
        <label for="id">Enter desired Employee</label>
        <input type="text" name="emptxt" id="emptxt" placeholder="i.e. John" required>
        <input type="submit" name="submit" id="submit" value="submit">
</form>

<?php
   if (isset($_POST['submit'])) {
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
       //echo "Data Retrieved: <br>";
     }

     $inName = mysqli_real_escape_string($con, $_POST['emptxt']);
     $exists = "False";

     while ($row = mysqli_fetch_assoc($retval)) {
       if ($inName == $row['fldName'])
       {
          $txtId = $row['ID'];
          $txtUser = $row['fldUser'];
          $txtPass = $row['fldPass'];
          $txtName = $row['fldName'];
          $txtPosition = $row['fldPosition'];
          $exists = "True";
          break;
       }
     }
     mysqli_close($con);

     if ($exists == "True")
     { ?>
      <p></p>
      <p> </p>
	<div class="formDesign">
      <form id="id-form" method="post">
		<p><B>--------------------Fill out the Form <U>Below</U> Please--------------------</B></p>
			<label for="id">Verify Current Employee's Name:</label>
			<input type="text" name="inName" id="idtxt" placeholder="Name">
			<p></p>

			<p>
			<label for="id">ID Field:</label>
			<input type="text" name="idtext" id="idtxt" placeholder="Employee ID">
			</p>

			<p>
			<label for="id">Username Field:</label>
			<input type="text" name="usrtext" id="usrtxt" placeholder="Employee Username">
			</p>

			<p>
			<label for="id">Password Field:</label>
			<input type="text" name="passtext" id="passtxt" placeholder="Employee Password">
			</p>

			<p>
			<label for="id">Employee Name Field:</label>
			<input type="text" name="nametext" id="nametxt" placeholder="Employee Name">
			</p>

			<p>
			<label for="id">Position Field:</label>
			<input type="text" name="postext" id="postxt" placeholder="Employee Position">
			</p>

			<p></p>
			<input type="submit" name="enter" id="enter" value="submit">
		</form>
	  </div>

<?php
     }
     else
     { ?>
       <label for="id">Please enter a current employee name</label> <?php
     }
   }
?>

<?php

     if (isset($_POST['enter'])) {

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
          //echo "Data Retrieved: <br>";
        }

        //$txtName = mysqli_real_escape_string($con, $_POST['emptxt']);
        $exists = "False";

        $inName = $_POST['inName'];
        $txtId;
        $txtUser;
        $txtPass;
        $txtName;
        $txtPosition;

        while ($row = mysqli_fetch_assoc($retval))
        {
           if ($inName == $row['fldName'])
           {
              $txtId = $row['ID'];
              $txtUser = $row['fldUser'];
              $txtPass = $row['fldPass'];
              $txtName = $row['fldName'];
              $txtPosition = $row['fldPosition'];
              $name = "True";
              break;
           }
        }

        // have unique ID's in the database and make a new column called type where its either a
        /*$txtId = $row['ID'];
        $txtUser = $row['fldUser'];
        $txtPass = $row['fldPass'];
        $txtName = $row['fldName'];
        $txtPosition = $row['fldPosition'];*/
        //$tempId = $txtId;
        $temp1 = $_POST['idtext'];
        $temp2 = $_POST['usrtext'];
        $temp3 = $_POST['passtext'];
        $temp4 = $_POST['nametext'];
        $temp5 = $_POST['postext'];

        if ($name != "True")
        { ?>
           <label for="id">Please enter a current employee name</label>
           <?php
        }
        else
        {
           if ($temp1 != "")
           {
              $txtId = $temp1;
              $q = "UPDATE tbl_userInfo SET ID ='$txtId' WHERE fldName='$inName'";
              $r = mysqli_query($con, $q);
           }
           if ($temp2 != "")
           {
              $txtUser = $temp2;
              $q = "UPDATE tbl_userInfo SET fldUser ='$txtUser' WHERE fldName='$inName'";
              $r = mysqli_query($con, $q);
           }
           if ($temp3 != "")
           {
              $txtPass = $temp3;
              $q = "UPDATE tbl_userInfo SET fldPass ='$txtPass' WHERE fldName='$inName'";
              $r = mysqli_query($con, $q);
           }
           if ($temp4 != "")
           {
              $txtName = $temp4;
              $q = "UPDATE tbl_userInfo SET fldName ='$txtName' WHERE fldName='$inName'";
              $r = mysqli_query($con, $q);
           }
           if ($temp5 != "")
           {
              $txtPosition = $temp5;
              $q = "UPDATE tbl_userInfo SET fldPosition ='$txtPosition' WHERE fldName='$inName'";
              $r = mysqli_query($con, $q);
           }
        }

        // database insert SQL code
// $sql = "UPDATE tbl_userInfo SET fldUser=$textUser WHERE id=$txtID";
// insert in database
// $rs = mysqli_query($con, $sql);
        /*echo "<br>";
        echo $temp1;
        echo "<br>";
        echo $temp2;
        echo "<br>";
        echo $temp3;
        echo "<br>";
        echo $temp4;
        echo "<br>";
        echo $temp5;
        echo "<br>";
        echo "ID works: <br>";*/

        mysqli_close($con);
     }


   //}
?>
