<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen | HRHomepage</title>
  <link rel="stylesheet" href="hrHomepage.css">
</head>

<body>
<div class="header">
  <a href="#default" class="logo">HashRen Manage</a>
  <div class="header-right">
    <a href="hrAbout.php">About</a>
    <a href="loginTest.php">Logout</a>
  </div>
</div>
<form id="nav" method="post">
   <input type="submit" name="timeM" class="btn timeM" value="Time Management" id="timeM">
   <input type="submit" name="empM" class="btn empM" value="Employee Management" id="empM">
   <input type="submit" name="onboard" class="btn onboard" value="Onboarding" id="onboard">
   <input type="submit" name="requests" class="btn requests" value="Requests" id="requests">

   <input type="submit" name="policy" class="btn2 policy" value="Policy Management" id="policy">
   <input type="submit" name="benefits" class="btn2 benefits" value="Benefits" id="benefits">
</form>

<?php
   // Test to see if Time Management was clicked
   if (isset($_POST['timeM'])) {
      // Open new window
      echo "<script>window.location.href='timeM.php';</script>";
   }
   // Test to see if Employee Management was clicked
   if (isset($_POST['empM'])) {
      // Open new window
      echo "<script>window.location.href='empM.php';</script>";
   }
   // Test to see if Onboarding was clicked
   if (isset($_POST['onboard'])) {
      // Open new window
      echo "<script>window.location.href='onboard.php';</script>";
   }
   // Test to see if Requests was clicked
   if (isset($_POST['requests'])) {
      // Open new window
      echo "<script>window.location.href='hrRequests.php';</script>";
   }
   // Test to see if Policies was clicked
   if (isset($_POST['policy'])) {
      // Open new window
      echo "<script>window.location.href='policy.php';</script>";
   }
   // Test to see if Benefits was clicked
   if (isset($_POST['benefits'])) {
      // Open new window
      echo "<script>window.location.href='benefits.php';</script>";
   }
?>

</body>

</html>