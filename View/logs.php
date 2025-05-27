

<form class="d-flex mb-3 logs-search" role="search" action="logs" method="get">
    <input class="form-control me-2 logs-search-input" type="search" placeholder="Search logs" aria-label="Search" name="search" value="<?php echo isset($_GET['search']) ? cleanString($_GET['search']) : ''; ?>">
    <button class="btn btn-outline-success logs-search-button" type="submit">Search</button>
</form>

<table class="table table-bordered table-logs">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">User ID</th>
        <th scope="col">Client IP</th>
        <th scope="col">User Agent</th>
        <th scope="col">Action</th>
        <th scope="col">Action Details</th>
        <th scope="col">Created At</th>
    </tr>
</thead>

<tbody id='table-body-logs'>

</tbody>


</table>

<nav aria-label="Page navigation">
  <ul class="pagination pagination-logs">

  </ul>
</nav>

<script type="module">
    import { getLogs } from './assets/services/logs.js'
    document.addEventListener('DOMContentLoaded', async () => {

    
    const logsContainer = document.getElementById('table-body-logs')
    const paginationContainer = document.querySelector('.pagination-logs')
    const searchInput = document.querySelector('.logs-search-input')
    const searchButton = document.querySelector('.logs-search-button')

    const initialSearch = searchInput.value.trim()
    const logs = await getLogs(logsContainer, paginationContainer, 1, initialSearch)

    searchButton.addEventListener('click', async (e) => {
        e.preventDefault()
        const search = searchInput.value.trim()
        await getLogs(logsContainer, paginationContainer, 1 ,search)
    })

})
</script>


