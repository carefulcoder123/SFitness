<?php
include 'config.php';

if(isset($_REQUEST["submit"])){
  $name = $_REQUEST["name"];
  $dob = $_REQUEST["dob"];
  $phone = $_REQUEST["phone"];
  $period = $_REQUEST["period"];
  $amount = $_REQUEST["amount"];
  $date = $_REQUEST["date"];
  $course = $_REQUEST["course"];

  $ins = "INSERT into members (name, dob, phone, period, amount, date, course) VALUES ('$name', '$dob', '$phone', '$period', '$amount', '$date', '$course',)";

  $query = mysqli_query($conncection, $ins);
}

?>