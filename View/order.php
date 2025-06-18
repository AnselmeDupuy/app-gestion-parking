<h2 class="text-center my-4">My Orders</h2>

<table class="table table-dark table-breservationed text-center">
  <thead>
    <tr>
      <th>#</th>
      <th>Vehicle</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Parking type</th>
      <th>Total Price</th>
      <th>Status</th>
      <th>Pay</th>
      <th>Cancel</th>
    </tr>
  </thead>
  <tbody id="order-container">

    
  </tbody>
</table>
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $_ENV['PAYPAL_CLIENT_ID']; ?>&currency=EUR"></script>
<script type="module">
import { getOrders, cancelOrder } from './assets/services/order.js'

document.addEventListener('DOMContentLoaded', async () => {
  
  const orderContainer = document.getElementById('order-container')

  const orders = await getOrders(orderContainer)

  document.addEventListener('click', async (e) => {
    const deleteBtn = e.target.closest('.delete-order-buttons')
    if (deleteBtn) {
      e.preventDefault()
      const orderId = deleteBtn.getAttribute('data-id')
      if(confirm('Do you want to delete this reservation ?')) {
        await cancelOrder(orderId, orderContainer)
      }
    }
  })

})




</script>