<div>


<div class="btn-group btn-group-reservations" role="group" aria-label="Basic radio toggle button group">
  <input type="radio" class="btn-check btn-reservations" name="btnradio" id="btn-waiting" data-id='waiting' autocomplete="off" checked>
  <label class="btn btn-outline-primary" for="btn-waiting">Waiting on payment</label>

  <input type="radio" class="btn-check btn-reservations" name="btnradio" id="btn-canceled" data-id='canceled' autocomplete="off">
  <label class="btn btn-outline-primary" for="btn-canceled">Canceled reservations</label>

  <input type="radio" class="btn-check btn-reservations" name="btnradio" id="btn-confirmed" data-id='confirmed' autocomplete="off">
  <label class="btn btn-outline-primary" for="btn-confirmed">Confirmed</label>
</div>

    <table class="table table-bordered table-reservations">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Parking_id</th>
                <th scope="col">Car_id</th>
                <th scope="col">Status</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Created At</th>
                <th scope="col">Parking subscription type</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody id='table-body-reservations'>
        
        </tbody>
    </table>
</div>
<script type="module">
import { getReservations } from './assets/services/reservations.js'

document.addEventListener('DOMContentLoaded', async () => {
    const reservationsContainer = document.getElementById('table-body-reservations')
    const statusBtns = document.querySelectorAll('.btn-reservations')

    statusBtns.forEach(btn => {
        btn.addEventListener('change', async (e) => {
            if (btn.checked) {
                const status = btn.getAttribute('data-id')
                await getReservations(reservationsContainer, status)
            }
        })
    })
    await getReservations(reservationsContainer, 'waiting')



})




</script>