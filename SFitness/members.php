<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? null;
    $dob = $_POST['dob'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $period = $_POST['period'] ?? null;
    $amount = $_POST['amount'] ?? null;
    $date = $_POST['date'] ?? null;
    $course = $_POST['course'] ?? null;

    // Simple validation - check if the required fields are not empty
    if (empty($name) || empty($dob) || empty($phone) || empty($period) || empty($amount) || empty($date) || empty($course)) {
        die("Error: All fields are required.");
    }

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'gym';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die('Connection Failed: ' . mysqli_connect_error());
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO members(name, dob, phone, period, amount, date, course) VALUES(?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $dob, $phone, $period, $amount, $date, $course);
        mysqli_stmt_execute($stmt);
        // echo "Membership Added Successfully...";
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Form</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
  


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

<!-- nav bar start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.html">SFitness</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Gym Management System</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php">Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="billing.php">Billing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="coach.php">Coach</a>
      </li>
    </ul>
</nav>
<!-- nav bar end     -->

<!-- <h1 style="text-align:center; color:white"> SFitness Membership Form</h1>
<br>
<br> -->

<!-- Form starts -->
<form action="#" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name of Member</label>
      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Member Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Date of Birth</label>
      <input type="text" name="dob" class="form-control" id="inputPassword4" placeholder="Date of Birth">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone Number</label>
      <input type="text" name="phone" class="form-control" id="inputPassword4" placeholder="Phone Number">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Time period for joining</label>
      <input type="text" name="period" class="form-control" id="inputPassword4" placeholder="Time Period">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Amount Paid</label>
      <input type="text" name="amount" class="form-control" id="inputPassword4" placeholder="Amount(Fees) Paid">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Date of Joining</label>
      <input type="text" name="date" class="form-control" id="inputPassword4" placeholder="Date of Joining">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Course chosen</label>
      <input type="text" name="course" class="form-control" id="inputPassword4" placeholder="Course">
    </div>
  </div>

  <br>

 <div class="text-center">
  <button type = "submit" class="btn btn-primary" >Submit </button>
</div> 
</form>
  

<!-- Form Ends -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>