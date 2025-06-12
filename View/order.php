<h2 class="text-center my-4">My Orders</h2>

<table class="table table-dark table-breservationed text-center">
  <thead>
    <tr>
      <th>#</th>
      <th>Vehicle</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Price</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reservations as $reservation): ?>
      <tr>
        <td><?php echo $reservation['id']; ?></td>
        <td><?php echo htmlspecialchars($reservation['car_name']) . ' - ' . htmlspecialchars($reservation['license_plate']); ?></td>
        <td><?php echo $reservation['start_time'];?></td>
        <td><?php echo $reservation['end_time']; ?></td>
        <td><?php echo 'price'; ?></td>
        <td><?php echo $reservation['status']; ?></td>
        <td>
            <div id="paypal-button-container-1"></div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script src="https://www.paypal.com/sdk/js?client-id=AcDfcUQ3_VogqxvnsGkdfKd5ey6twglEkCzbtBwZNkhW8rzeWr0BDeQ4uHUDfJaqvCSIzt0acdpN1pI1&currency=EUR"></script>
<script type="module">
    paypal.Buttons({
        style: {
                layout: 'horizontal',
                color: 'silver',
                shape: 'pill',
                label: 'pay'
        },
        createOrder: function(data,actions) {
            return actions.order.create({
                purchage_units: [{
                    amount: {
                        value: '2.0'
                    }
                }]
            })
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                fetch('pay_order.php', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        orderId: '1',
                    })
                }).then(res => res.json())
                .then(res => {
                    if (res.success) {
                        alert("Order Complete")
                        location.reload()
                    } else {
                        alert("Pament captured but failed backend")
                    }
                })
            })
        }
    }).render('#paypal-button-container-1')
</script>


