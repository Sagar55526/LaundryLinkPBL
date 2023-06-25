<?php
require 'config.php';

if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "owner") {
  header("Location: login.php");
  exit;
}

if (isset($_POST["confirm"])) {
  $requestId = $_POST["request_id"];
  
  // Update the status of the request to "Confirmed"
  $sql = "UPDATE laundry_requests SET status = 'Confirmed' WHERE request_id = '$requestId'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>
