<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Playfair&family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300;1,500&display=swap" rel="stylesheet">
    <style>
      body {
background-image: linear-gradient(to right , #DDFFBB, #C7E9B0, #B3C99C);
        text-align: center;
        color: black;
	
      }
      h1 {
        margin-top: 100px;
        font-size: 50px;
font-family: playfair;
      }
      p {
        font-size: 24px;
	font-family: kanit;
	font-weight: 700;
      }
      .button {
        display: inline-block;
        padding: 12px 50px;
        color: black;
font-size: 20px;
        text-align: center;
        font-size: 18px;
        border-radius: 8px;
        margin-top: 50px;
margin-left: 50px;
margin-right: 5px;
background-color: #F7DB6A;
        text-decoration: none;
      }

      .button:hover {
        background-color: #FFCB42;
border-radius: 25px;
      }

.interval{
height= 1700px;
width: 700px;
margin-left: 20px;
padding-top: 30px;}

.machine{
width:50%;
position: absolute;
top: 100px;
}




.machine{
animation: myfirst 3s linear 1s infinite alternate;
}
@keyframes myfirst{
0% {background-color: left: 0px; top: 0px;}
50% {background-color: left: 0px; top: 20px;}
100% {background-color: left: 0px; top: 0px;}
}

    </style>
  </head>
  <body>
<div class="frame">
<div class="interval">
    <h1>Welcome <?php echo $row["name"]; ?>!!</h1>
  <strong>  <p>  Our system is designed to make your laundry management easier and more efficient. With our user-friendly interface, you can easily manage all your laundry requests, view notifications, and update your account information.

We understand that laundry day can be a hassle, but our system is here to help you streamline the process and make it a breeze. Whether you need a quick wash and fold, or a more extensive dry cleaning service, we've got you covered.

Thank you for choosing our Laundry Management System. We're excited to make your laundry experience as stress-free as possible!</p></strong>
    <a href="dashboard.html" class="button">Dashboard</a>
    <a href="logout.php" class="button">Logout</a>
</div>

<div>
<img src="dash_bg.png" alt="interface" class="machine">
</div>

</div>
  </body>
</html>
