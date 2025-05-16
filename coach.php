<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'] ?? null;
    $dob = $_POST['dob'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $experience = $_POST['experience'] ?? null;

    // Simple validation - check if the required fields are not empty
    if (empty($name) || empty($dob) || empty($phone) || empty($experience)) {
        die("Error: All fields are required.");
    }

    // Establishing database connection
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'gym';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die('Connection Failed: ' . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("INSERT INTO coach(name, dob, phone, experience) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $dob, $phone, $experience);
        $stmt->execute();
        // echo "Coach Data Added Successfully...";
        $stmt->close();
        $conn->close(); 
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Form</title>
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

<!-- Form starts -->
<form action="#" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name </label>
      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Coach Name">
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
      <label for="inputPassword4">Experience</label>
      <input type="text" name="experience" class="form-control" id="inputPassword4" placeholder="Working Experience">
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