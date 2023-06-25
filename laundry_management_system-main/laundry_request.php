<?php
require 'config.php';

if(!isset($_SESSION["login"])){
  header("Location: login.php");
}

if(isset($_POST["submit"])){
  $user_id = $_SESSION["id"];
  $pickup_date = $_POST["pickup_date"];
  $pickup_time = $_POST["pickup_time"];
  $delivery_date = $_POST["delivery_date"];
  $delivery_time = $_POST["delivery_time"];
  $wash_fold = $_POST["wash_fold"];
  $wash_iron = $_POST["wash_iron"];
  $dry_clean = $_POST["dry_clean"];
  $price = calculate_price($wash_fold, $wash_iron, $dry_clean);
  $status = "Pending";
  
  $sql = "INSERT INTO laundry_requests (user_id, pickup_date, pickup_time, delivery_date, delivery_time, wash_fold, wash_iron, dry_clean, price, status) VALUES ('$user_id', '$pickup_date', '$pickup_time', '$delivery_date', '$delivery_time', '$wash_fold', '$wash_iron', '$dry_clean', '$price', '$status')";

  if(mysqli_query($conn, $sql)){
    echo "<script> alert('Laundry request submitted successfully.'); </script>";
  }
  else{
    echo "<script> alert('Error: Unable to submit laundry request.'); </script>";
  }
}

function calculate_price($wash_fold, $wash_iron, $dry_clean){
  // Calculation logic goes here
  
    $wash_fold_price = 7.0; // $7.0 per pound
    $wash_iron_price = 10.0; // $10.0 per pound
    $dry_clean_price = 20.0; // $20.0 per item
    
    $total_price = $wash_fold * $wash_fold_price + $wash_iron * $wash_iron_price + $dry_clean * $dry_clean_price;
    
    // Round the price to 2 decimal places
    $total_price = round($total_price, 2);
    
    return $total_price;

  
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Laundry Request Form</title>
    <style>
    body {
      background-image: linear-gradient(to right, #ECC5FB   , #CDF0EA );
      background-size: cover;
      font-family: Arial, sans-serif;
      background-color: #F9F9F9;
    }
    
    form {
      border: 3px solid #f1f1f1;
      background-color: #ffffff;
      width: 500px;
      margin-left: 650px; ;
      padding: 20px;
margin-top: 0px;
    }
    
    h2 {
      text-align: center;
      margin-top: 0;
    }
    
    input[type=text], input[type=password], input[type=number], input[type=date], input[type=time] {
      width: 100%;
      padding: 12px 20px;
      margin-bottom: 16px;
      display: block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    
    button {
      background-color: #C780FA;
      color: black;
font-size: 20px;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    .container {
      padding: 16px;
    }

img{
width: 850px;
}

	.grid{
	display: grid;
	 grid-template-columns: auto auto auto;
	}

	.item1{
		width: 250px;
position: relative;
margin-top: 50px;
	}



    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }
      .registerbtn {
        width: 100%;
      }
    }
  </style>
  </head>
  <body>
<div class="grid">
<div class="item1">
  <img src="cloths_hold.png" alt="interface" class="interface">
</div>
<div class="item2">
    <form class="" action="" method="post">
<h2>Laundry Request Form</h2>
      <label for="pickup_date">Pickup Date:</label>
      <input type="date" name="pickup_date" id="pickup_date" required> 
      
      <label for="pickup_time">Pickup Time:</label>
      <input type="time" name="pickup_time" id="pickup_time" required> 
      
      <label for="delivery_date">Expected Delivery Date:</label>
      <input type="date" name="delivery_date" id="delivery_date" required> 
      
      <label for="delivery_time">Expected Delivery Time:</label>
      <input type="time" name="delivery_time" id="delivery_time" required> 
      
      <label for="wash_fold">Wash &amp; Fold (number of clothes):</label>
      <input type="number" name="wash_fold" id="wash_fold" min="0" value="0"> 
      
      <label for="wash_iron">Wash &amp; Iron (number of clothes):</label>
      <input type="number" name="wash_iron" id="wash_iron" min="0" value="0"> 
      
      <label for="dry_clean">Dry Clean (number of clothes):</label>
      <input type="number" name="dry_clean" id="dry_clean" min="0" value="0"> 
      
      <button type="submit" name="submit">Submit</button>

      <a href="dashboard.html" style="text-decoration: none; margin-right: 20px;">Go back</a>
    </form>
</div>
</div>
  </body>
</html>

