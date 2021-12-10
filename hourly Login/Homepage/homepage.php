<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HashRen Login</title>
  <link rel="stylesheet" href="homepage.css">
</head>

<body>
<div class="header">
  <a href="#default" class="logo">HashRen Manage</a>
  <div class="header-right">
    <a href="about.php">About</a>
    <a href="loginTest.php">Logout</a>
  </div>
</div>
<form id="nav" method="post">
   <input type="submit" name="learning" class="btn2 learning" value="E-Learning" id="learning">
   <input type="submit" name="department" class="btn2 department" value="Department" id="department">

   <input type="submit" name="schedule" class="btn schedule" value="My Schedule" id="schedule">
   <input type="submit" name="requests" class="btn requests" value="My Availability" id="requests">
   <input type="submit" name="account" class="btn account" value="My Account" id="account">

   <input type="submit" name="calender" class="btn calender" value="Corporate Calender" id="calender">
   <input type="submit" name="news" class="btn news" value="Corporate News" id="news">
   <input type="submit" name="hr" class="btn hr" value="Human Resources" id="hr">
</form>

<?php
   // Test to see if E-Learning was clicked
   if (isset($_POST['learning'])) {
      // Open new window
      echo "<script>window.location.href='learning.php';</script>";
   }
   // Test to see if Department was clicked
   if (isset($_POST['department'])) {
      // Open new window
      echo "<script>window.location.href='department.php';</script>";
   }
   // Test to see if Shedule was clicked
   if (isset($_POST['schedule'])) {
      // Open new window
      echo "<script>window.location.href='schedule.php';</script>";
   }
   // Test to see if Requests was clicked
   if (isset($_POST['requests'])) {
      // Open new window
      echo "<script>window.location.href='request.php';</script>";
   }
   // Test to see if Account was clicked
   if (isset($_POST['account'])) {
      // Open new window
      echo "<script>window.location.href='account.php';</script>";
   }
   // Test to see if Calender was clicked
   if (isset($_POST['calender'])) {
      // Open new window
      echo "<script>window.location.href='calender.php';</script>";
   }
   // Test to see if Corporate News was clicked
   if (isset($_POST['news'])) {
      // Open new window
      echo "<script>window.location.href='news.php';</script>";
   }
   // Test to see if Human Resources was clicked
   if (isset($_POST['hr'])) {
      // Open new window
      echo "<script>window.location.href='hr.php';</script>";
   }
?>

</body>

</html>