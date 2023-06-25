<?php
require 'config.php';

if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "owner") {
  header("Location: login.php");
  exit;
}

// Rest of the code...
?>


// Retrieve pending laundry requests
$sql = "SELECT * FROM laundry_requests WHERE status = 'Pending'";
$result = mysqli_query($conn, $sql);

<table>
  <tr>
    <th>User ID</th>
    <th>Pickup Date</th>
    <th>Pickup Time</th>
    <th>Delivery Date</th>
    <th>Delivery Time</th>
    <th>Actions</th>
  </tr>
  
  <?php
  // Iterate over the pending requests
  while ($row = mysqli_fetch_assoc($result)) {
    $requestId = $row['request_id'];
    $userId = $row['user_id'];
    $pickupDate = $row['pickup_date'];
    $pickupTime = $row['pickup_time'];
    $deliveryDate = $row['delivery_date'];
    $deliveryTime = $row['delivery_time'];
    ?>
    <tr>
      <td><?php echo $userId; ?></td>
      <td><?php echo $pickupDate; ?></td>
      <td><?php echo $pickupTime; ?></td>
      <td><?php echo $deliveryDate; ?></td>
      <td><?php echo $deliveryTime; ?></td>
      <td>
        <form action="confirm.php" method="post">
          <input type="hidden" name="request_id" value="<?php echo $requestId; ?>">
          <button type="submit" name="confirm">Confirm</button>
        </form>
      </td>
    </tr>
    <?php
  }
  ?>
  
</table>
