<form id="reservation-form" method="post">
    <label for="reservation-date">Date de réservation:</label>
    <input type="date" id="reservation-date" name="reservation_date" required>

    <label for="reservation-start-time">Heure de début:</label> 
    <input type="time" id="reservation-start-time" name="reservation_start_time" step="1800" required>

    <label for="reservation-end-time">Heure de fin:</label>
    <input type="time" id="reservation-end-time" name="reservation_end_time" step="1800" required>

    <label for="vehicle-select">Sélectionnez un véhicule:</label>
    <select id="vehicle-select" name="vehicle_id" >
        <?php foreach ($cars as $car): ?>
            <option value="<?php echo $car['id']; ?>">
                <?php echo htmlspecialchars($car['car_name']) . ' - ' . htmlspecialchars($car['license_plate']); ?>
            </option>
        <?php endforeach; ?>

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