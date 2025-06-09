<form class="row g-3" id="reservation-form" method="post">
    <label for="reservation-date">Date :</label>
    <input class="form-control" type="date" id="reservation-date" name="reservation_date" 
    value="<?php echo date("Y-m-d") ;?>" placeholder="<?php echo date("d-m-Y") ;?>" required>

    <label for="reservation-start-time">From :</label> 
    <select class="form-select" id="reservation-start-time" name="reservation_start_time" required>
    <?php
    for ($hours = 0; $hours <= 23; $hours++) {
        foreach ([0, 15, 30, 45] as $minutes) {
            $time = sprintf('%02d:%02d', $hours, $minutes);
            echo "<option value=\"$time\">$time</option>";
        }
    }
    ?>
    </select>

    <label for="reservation-end-time">to :</label>
    <select class="form-select" id="reservation-end-time" name="reservation_end_time" required>
    <?php
    for ($hours = 0; $hours <= 23; $hours++) {
        foreach ([0, 15, 30, 45] as $minutes) {
            $time = sprintf('%02d:%02d', $hours, $minutes);
            echo "<option value=\"$time\">$time</option>";
        }
    }
    ?>
    </select>

    <label for="vehicle-select">Vehicle :</label>
    <select class="form-select" id="vehicle-select" name="vehicle_id" >
        <?php foreach ($cars as $car): ?>
            <option value="<?php echo $car['id']; ?>">
                <?php echo htmlspecialchars($car['car_name']) . ' - ' . htmlspecialchars($car['license_plate']); ?>
            </option>
        <?php endforeach; ?>

    </select>

    <label for="parking-type-select">Type of parking :</label>
    <select class="form-select" id="parking-type-select" name="parking_type">
        <option value="basic">basic</option>
        <option value="electric">Electric</option>
        <option value="handicapped">handicapped</option>
    </select>
    <button type="submit" name="add_reservation">Réserver</button>

<div id="paypal-button-container"></div>

<script type="module">
    import { addReservation } from './assets/services/reservation.js'
    document.addEventListener('DOMContentLoaded', async () => {
        const reservationForm = document.getElementById("reservation-form")
        
        document.getElementById("reservation-form").addEventListener("submit", async (e) => {
            e.preventDefault()
            addReservation(reservationForm)
        })
    })
</script>