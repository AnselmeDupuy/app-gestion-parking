
<div class="mt-2 mb-2">
    <h1 class="text-center">Users list</h1>
</div>

<form class="d-flex users-search" role="search" action="users" method="get">
        <input class="form-control me-2 users-search-input" type="search" placeholder="Search a user" aria-label="Search" name="search" value="<?php echo (isset($_GET['search'])) ? cleanString($_GET['search']) : '';?>">
        <button class="btn btn-outline-success users-search-button" type="submit">Search</button>
</form>

<div class="row users-list">
    <table class="table table-bordered table-users">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Role</th>
                <th scope="col">Created At</th>
                <th scope="col">Active</th>
                <th scope="col">Active</th>
                <th scope="col">Delete user</th>
            </tr>
        </thead>

        <tbody id='table-body-users'>

        </tbody>
    </table>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination pagination-users">

    </ul>
</nav>


<script type="module">
    import  { getUsers } from './assets/services/users.js';
    document.addEventListener('DOMContentLoaded', async () => {

    const usersContainer = document.getElementById('table-body-users')
    const paginationContainer = document.querySelector('.pagination-users')
    const searchInput = document.querySelector('.users-search-input');
    const searchButton = document.querySelector('.users-search-button')

    const initialSearch = searchInput.value.trim()
    const users = await getUsers(usersContainer, paginationContainer, 1, initialSearch)

    searchButton.addEventListener('click', async (e) => {
        e.preventDefault()
        const search = searchInput.value.trim()
        await getUsers(usersContainer, paginationContainer, 1 ,search)
    })
 })
</script>
