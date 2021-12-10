<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remove Employee</title>
  <link rel="stylesheet" href="hrHomepage.css">
  <link rel="stylesheet" href="remEmp.css">
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
    <legend>Remove Employee Schedule Form</legend>
    <form name="remEmployee" method="post">
      <p>
        <label for="id">Enter the name of the employee to remove from schedule</label>
        <input type="text" name="txtEmp" id="txtEmp" placeholder="Employee Name" required>
      </p>
      <p>
        <input type="submit" name="enter" id="enter" value="Remove">
      </p>
    </form>
  </fieldset>
</body>
</html>

<?php
   if (isset($_POST['enter'])) 
   {
      //echo "Connected <Br>";
      // database connection code
      // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
      $servername = "localhost";
      $username = "hashren9_james";
      $password = "Mordor72!";
      $databasename = "hashren9_myDB";

      $con = mysqli_connect($servername, $username, $password, $databasename);
      
      $query = "SELECT User FROM tbl_availability";
      $retval = mysqli_query($con, $query);
      
      $inName = $_POST['txtEmp'];
	  $name;
      
      while ($row = mysqli_fetch_assoc($retval))
      {
         if ($inName == $row['User'])
         {
            $name = $row['User'];
            $name = "True";
            break;
         }
      }
      
      if ($name == "True")
      {
         // database insert SQL code
         $sql = "DELETE FROM tbl_availability WHERE User='$inName'";
         // insert in database
         $rs = mysqli_query($con, $sql);
      }
      else
      {
         echo "Please enter a currently scheduled employee";
      }
      
      /*echo "$inName <Br>";
      echo "$txtId <Br>";
      echo "$txtUser <Br>";
      echo "$txtPass <Br>";
      echo "$txtName <Br>";
      echo "$txtPosition <Br>";*/
      // database insert SQL code
      //$sql = "DELETE FROM tbl_userInfo WHERE fldName='$inName'";

      // insert in database
      //$rs = mysqli_query($con, $sql);

      //if($rs)
      //{
        // echo "Employee Information Successfully Recorded";
      //}
      mysqli_close($con);
   }
?>