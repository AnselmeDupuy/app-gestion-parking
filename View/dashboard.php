<div class="dashboardBody">
  <div class="dashboardCardBody">
    <h1 class="dashBoardh1">Welcome, <?php echo $_SESSION['first_name'] ?>!</h1>

  <?php foreach($reservations as $reservation): ?>
    <div class="dashBoardCard">
      <h3>Reserved Parking Spot</h3>
      <p>reservation number: <?php echo $reservation['id']; ?> </p>
      <p>Car number: <?php echo $reservation['car_id']; ?></p>
      <p>reservation time: <?php echo $reservation['start_time']; ?></p>
      <p>Duration: <?php echo getDuration($reservation['start_time'], $reservation['end_time']); ?></p>
      <p>Place number: <?php echo $reservation['parking_id']; ?></p>
      <p>Reservation made at: <?php echo $reservation['created_at']; ?></p>
      <p>Status: <?php echo $reservation['status']; ?></p>
    </div>
  <?php endforeach; ?>
  </div>

  <div class="dashboardPaymentBody">
    <ul class="list-group">
      <li class="list-group-item">
        <h2>Reservations</h2>
        <p>List of order</p>
      </li>
      <?php foreach ($reservations as $reservation): ?>
        <li class="list-group-item">
          <h3>Reservation #<?php echo $reservation['id']; ?></h3>
          <p>Car: <?php echo htmlspecialchars($reservation['car_name']) . ' - ' . htmlspecialchars($reservation['license_plate']); ?></p>
          <p>Start Time: <?php echo $reservation['start_time']; ?></p>
          <p>End Time: <?php echo $reservation['end_time']; ?></p>
          <p>Status: <?php echo $reservation['status']; ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  <div id="paypal-button-container"></div>
        
  </div>
</div>