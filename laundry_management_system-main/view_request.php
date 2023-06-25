<?php
require 'config.php';
if(empty($_SESSION["id"])){
  header("Location: login.php");
}
$user_id = $_SESSION["id"];
$query = "SELECT * FROM laundry_requests WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>requests</title>
    <style>
       body {
     background-image: linear-gradient(to right, #ECC5FB   , #CDF0EA );
 	text-align: center;
    background-size: cover;
  }

table{
text-align: center;
}

th{
padding: 10px;
padding-bottom: 30px;
font-size:20px;
}

td{
padding: 10px;}

 button {
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
background-color: #79E0EE;
        text-decoration: none;
      }

      button:hover {
        background-color: #C780FA;
border-radius: 25px;
      }




  </style>
  </head>
  <body>

    <center><h1>Current Requests<h1></center>
    <?php if(mysqli_num_rows($result) > 0): ?>
      <center><table>
        <tr>
          <th>Pickup Date</th>
          <th>Pickup Time</th>
          <th>Delivery Date</th>
          <th>Delivery Time</th>
          <th>Wash and Fold</th>
          <th>Wash and Iron</th>
          <th>Dry Clean</th>
          <th>Price</th>
          <th>Status</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr>

            <td ><?php echo $row['pickup_date']; ?></td><br>
            <td><?php echo $row['pickup_time']; ?></td><br>
            <td><?php echo $row['delivery_date']; ?></td>
            <td><?php echo $row['delivery_time']; ?></td>
            <td><?php echo $row['wash_fold']; ?></td>
            <td><?php echo $row['wash_iron']; ?></td>
            <td><?php echo $row['dry_clean']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['status']; ?></td>
          </tr>
        <?php endwhile; ?>
      </table></center>
    <?php else: ?>
      <p>No laundry requests found,book your request below</p>
     
    <?php endif; ?>
    <br><br>
	<center><a href="laundry_request.php"><button>Book Now</button></a></center>
    <br>
  </body>
</html>