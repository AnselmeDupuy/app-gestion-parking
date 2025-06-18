<div>

    <form class="d-flex mb-3 reservations-search" role="search" action="reservations" method="get">
        <input class="form-control me-2 reservations-search-input" type="search" placeholder="Search reservations" aria-label="Search" name="search" value="<?php echo isset($_GET['search']) ? cleanString($_GET['search']) : ''; ?>">
        <button class="btn btn-outline-success reservations-search-button" type="submit">Search</button>
    </form> 

    <div class="btn-group btn-group-reservations" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check btn-reservations" name="btnradio" id="btn-waiting" data-id='waiting' autocomplete="off" checked>
        <label class="btn btn-outline-primary" for="btn-waiting">Waiting on payment</label>

        <input type="radio" class="btn-check btn-reservations" name="btnradio" id="btn-canceled" data-id='canceled' autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-canceled">Canceled reservations</label>

        <input type="radio" class="btn-check btn-reservations" name="btnradio" id="btn-confirmed" data-id='confirmed' autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-confirmed">Confirmed</label>

        <input type="radio" class="btn-check btn-reservations" name="btnradio" id="btn-expired" data-id='expired' autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-expired">Expired</label>
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

    <nav aria-label="Page navigation">
        <ul class="pagination pagination-reservations">

        </ul>
    </nav>


</div>
<script type="module">
import { getReservations } from './assets/services/reservations.js'

document.addEventListener('DOMContentLoaded', async () => {

    const reservationsContainer = document.getElementById('table-body-reservations')
    const statusBtns = document.querySelectorAll('.btn-reservations')
    const paginationContainer = document.querySelector('.pagination-reservations')
    const searchInput = document.querySelector('.reservations-search-input')
    const searchButton = document.querySelector('.reservations-search-button')

    const initialSearch = searchInput.value.trim()
    const initialStatus = 'waiting'

    await getReservations(reservationsContainer, initialStatus, paginationContainer, 1, initialSearch)

    searchButton.addEventListener('click', async (e) => {
        e.preventDefault()
        const search = searchInput.value.trim()
        const checkedBtn = document.querySelector('.btn-reservations:checked')
        const status = checkedBtn ? checkedBtn.getAttribute('data-id') : 'waiting'
        await getReservations(reservationsContainer, status, paginationContainer, 1, search)
    })

    statusBtns.forEach(btn => {
        btn.addEventListener('change', async (e) => {
            if (btn.checked) {
                const search = searchInput.value.trim()
                const status = btn.getAttribute('data-id')
                await getReservations(reservationsContainer, status, paginationContainer, 1, search)
            }
        })
    })
})




</script>