<div>
    <table class="table table-bordered table-reservation">
        <thead>
            <tr>
                <th scope="col">Reservation number</th>
                <th scope="col">Parking_id</th>
                <th scope="col">Car_id</th>
                <th scope="col">Status</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody id='table-body-reservations'>
            
                <?php foreach($reservations as $reservation): ?>
                    <tr>
                    <td><?php echo $reservation['id']; ?></td>
                    <td><?php echo $reservation['parking_id']; ?></td>
                    <td><?php echo $reservation['car_id']; ?></td>
                    <td><?php echo $reservation['status']; ?></td>
                    <td><?php echo $reservation['start_time']; ?></td>
                    <td><?php echo $reservation['end_time']; ?></td>
                    <td><?php echo $reservation['created_at']; ?></td>
                    <td>place holder</td>
                    </tr>
                <?php endforeach; ?>
        
        </tbody>
    </table>
</div>

<div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=AcDfcUQ3_VogqxvnsGkdfKd5ey6twglEkCzbtBwZNkhW8rzeWr0BDeQ4uHUDfJaqvCSIzt0acdpN1pI1&components=buttons"></script>
<script>
paypal.Buttons({
            style: {
                layout: 'horizontal',
                color: 'silver',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: parseFloat(priceDisplay.textContent.replace(",", ".")).toFixed(2)
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    const reservationDate = document.getElementById("reservation-date").value;
                    const reservationStartTime = document.getElementById("reservation-start-time").value;
                    const reservationEndTime = document.getElementById("reservation-end-time").value;
                    const vehicleSelect = document.getElementById("vehicle-select").value;

                    if (!reservationDate || !reservationStartTime || !reservationEndTime || !vehicleSelect) {
                        alert("Veuillez remplir tous les champs");
                        return;
                    }

                    reserve(reservationDate, reservationStartTime, reservationEndTime, vehicleSelect);
                });
            }
        }).render('#paypal-button-container');
</script>