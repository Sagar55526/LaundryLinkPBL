<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "laundry (1)");

if(!empty($_SESSION["id"])){
  // Redirect to the appropriate dashboard based on the user's role
  if ($_SESSION["role"] === "owner") {
    header("Location: owner_dashboard.php");
  } else {
    header("Location: index.php");
  }
  exit;
}

if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["role"] = $row["role"]; // Store the role in the session
      
      // Redirect to the appropriate dashboard based on the user's role
      if ($row["role"] === "owner") {
        header("Location: owner_dashboard.php");
      } else {
        header("Location: index.php");
      }
      exit;
    }
    else{
      echo "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo "<script> alert('User Not Registered'); </script>";
  }
}





?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
    body {
      
  background-image: url('login_bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
      background-size: cover;
    	margin-top: 150px;
      font-family: Arial, sans-serif;
      background-color: #F9F9F9;
    }
   

    form {
      
      background-color: #ffffff;
      width: 350px;
height: 300px;
      padding: 20px;
position: absolute;
top: 80px;
margin-left: 900px;
margin-top: 80px;
    }
    h2 {
      text-align: center;
      margin-top: 0;
    }
    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    button {
      background-color: #79E0EE;
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
    .registerbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }
    .container {
      padding: 16px;
    }
    span.psw {
      float: right;
      padding-top: 16px;
    }
    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }
.interface{
position: absolute;
top: 30px;
left: 230px;
width: 1070px;
padding-top: 1px;;
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



.foam{
width:100%;
height: }
  </style>
  </head>
  <body>
<div>
<center><img src="interface.jpg" alt="interface" class="interface"></center>
    
    <form class="" action="" method="post" autocomplete="off">
<h2>Login</h2>
      <label for="usernameemail">Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
<div style="display: flex; justify-content: space-between; align-items: center;">
  <button style="width: 115px; height: 50px; background-color: #C780FA;"><a href="registration.php" style="text-decoration: none; color: white;font-size: 20px;">Register</a></button>
  <a href="forgot_password.php" style="text-decoration: none; margin-right: 20px;">Forgot password?</a>
</div>

</div>






      


  </form>
  </body>
</html>

