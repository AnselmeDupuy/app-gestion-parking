<form class="row g-3 reservation-form" id="reservation-form" method="post">
    <label for="reservation_start_date">Date :</label>
    <input class="form-control" type="date" id="reservation_start_date" name="reservation_start_date" 
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

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="switchReservation">
        <label class="form-check-label" for="switchReservation">Make a reservation across multiple days</label>
    </div> 

    <label for="reservation_end_date" id='reservation-end-date-label' hidden>Ending date :</label>
    <input class="form-control" type="date" id="reservation-end-date" name="reservation_end_date" 
    value="<?php echo date("Y-m-d") ;?>" placeholder="<?php echo date("d-m-Y") ;?>" disabled hidden>

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
        <option value="basic">Basic</option>
        <option value="electric">Electric</option>
        <option value="handicapped">handicapped</option>
    </select>

    <div id="reservation-price"></div>

    <button type="submit" id="submit-btn-reservation" name="add_reservation">Confirm</button>

</form>
<script type="module">
    import { addReservation } from '/assets/services/reservation.js'
    import { calculatePrice } from '/assets/services/functions.js'
    document.addEventListener('DOMContentLoaded', async () => {
        const reservationForm = document.getElementById("reservation-form")
        const switchDate = document.getElementById('switchReservation')
        const endDateLabel = document.getElementById('reservation-end-date-label')

        const startDateInput = document.getElementById('reservation_start_date')
        const startTimeInput = document.getElementById('reservation-start-time')
        const endDateInput = document.getElementById('reservation-end-date')
        const endTimeInput = document.getElementById('reservation-end-time')
        const priceContainer = document.getElementById('reservation-price')

        function updatePrice() {
            const startDate = startDateInput.value
            const startTime = startTimeInput.value
            const endDate = endDateInput.disabled ? startDate : endDateInput.value
            const endTime = endTimeInput.value

            if (startDate && startTime && endTime) {
                const start = new Date(`${startDate}T${startTime}`)
                const end = new Date(`${endDate}T${endTime}`)
                let price = 0
                if (end > start) {
                    price = calculatePrice(start, end, 1.00)
                }
                priceContainer.textContent = `Price (prevision of cost based on normal week Days) : ${price} €`
            } else {
                priceContainer.textContent = 'Price : 0 €'
            }
        }
        
        [startDateInput, startTimeInput, endDateInput, endTimeInput, switchDate].forEach(input => {
            input.addEventListener('input', updatePrice)
            input.addEventListener('change', updatePrice)
        })

        switchDate.addEventListener('change', (e) => {
            endDateInput.disabled = !switchDate.checked
            endDateInput.hidden = !switchDate.checked
            endDateLabel.hidden = !switchDate.checked
            updatePrice()
        })
        


        
        
        reservationForm.addEventListener("submit", async (e) => {
            e.preventDefault()
            await addReservation(reservationForm)
        })

        updatePrice()
    
    })
</script>