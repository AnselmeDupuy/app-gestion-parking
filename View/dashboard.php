<div class="dashboardBody">
  <div class="dashboardCardBody">
    <h1 class="dashBoardh1">Welcome <?php echo $_SESSION['first_name'] ?>, here are your reservations!</h1>

    <div class="cardsLists">
  <?php foreach($reservations as $reservation): ?>
    <div class="dashBoardCard">
      <h3>Reserved Parking Spot</h3>
      <p>Reservation number : <?php echo $reservation['id']; ?> </p>
      <p>Car : <?php echo $reservation['car_name']; ?></p>
      <p>Reservation start at : <?php echo $reservation['start_time']; ?></p>
      <p>Reservation end at : <?php echo $reservation['end_time']; ?></p>
      <p>Duration : <?php echo getDuration($reservation['start_time'], $reservation['end_time']); ?></p>
      <p>Place number : <?php echo $reservation['parking_id']; ?></p>
      <p>Reservation made at : <?php echo $reservation['created_at']; ?></p>
      <p>Status : <?php echo $reservation['status']; ?></p>
    </div>
  <?php endforeach; ?>
    </div>
  </div>
</div>