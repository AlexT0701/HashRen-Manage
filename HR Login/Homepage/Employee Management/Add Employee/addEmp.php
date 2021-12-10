<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Employee</title>
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
<div class="empHeader">
	<H1>Employee Form</H1>
</div>

<body>
   <form name="addEmployee" method="post">
     <p>
       <label for="id">ID</label>
       <input type="text" name="txtId" id="txtId" placeholder="Employee ID" required>
     </p>
     <p>
        <label for="user">User </label>
        <input type="text" name="txtUser" id="txtUser" placeholder="Employee Username" required>
      </p>
      <p>
        <label for="pass">Pass</label>
        <input type="text" name="txtPass" id="txtPass" placeholder="Employee Password" required>
      </p>
      <p>
        <label for="name">Name</label>
        <input type="text" name="txtName" id="txtName" placeholder="Employee Name" required>
      </p>
      <p>
        <label for="position">Position</label>
        <input type="text" name="txtPosition" id="txtPosition" placeholder="Employee Position" required>
      </p>
      <p>&nbsp;</p>
      <p>
        <input type="submit" name="Submit" id="Submit" value="Submit">
      </p>
    </form>
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

      // get the post records
      $txtId = $_POST['txtId'];
      $txtUser = $_POST['txtUser'];
      $txtPass = $_POST['txtPass'];
      $txtName = $_POST['txtName'];
      $txtPosition = $_POST['txtPosition'];
      
      /*echo "$txtId <Br>";
      echo "$txtUser <Br>";
      echo "$txtPass <Br>";
      echo "$txtName <Br>";
      echo "$txtPosition <Br>";*/
      // database insert SQL code
      $sql = "INSERT INTO `tbl_userInfo` (`ID`, `fldUser`, `fldPass`, `fldName`, `fldPosition`) VALUES ('$txtId', '$txtUser', '$txtPass', '$txtName', '$txtPosition')";

      // insert in database
      $rs = mysqli_query($con, $sql);

      if($rs)
      {
         echo "Employee Information Successfully Recorded";
      }
      mysqli_close($con);
   }
?>