<div class="navbar">
    <h2>Parking</h2>
    <nav class="navbarLinks">

    </nav>
</div>
  <script type="module">
    import { getUser, isAdmin, isUser, isGuest } from "./assets/services/navBar.js"

    const user = "<?php echo isset($_SESSION['group']) ? $_SESSION['group'] : 'guest'; ?>"
    const id = "<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>"

    document.addEventListener('DOMContentLoaded', async () => {
        const navbarLinks = document.querySelector('.navbarLinks')

        if (isAdmin(user)) {
            navbarLinks.innerHTML += `<a href="home">Home</a>`
            navbarLinks.innerHTML += `<div class="dropdown admin-panel-dropdown">
                                            <button class="btn dropdown-toggle admin-panel-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Admin panel
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="logs">Logs</a></li>
                                                <li><a class="dropdown-item" href="users">Users</a></li>
                                                <li><a class="dropdown-item" href="reservations">Reservations</a></li>
                                                <li><a class="dropdown-item" href="parkings">Parkings</a></li>
                                            </ul>
                                       </div>`
            navbarLinks.innerHTML += `<a href="reservation">reservation</a>`
            navbarLinks.innerHTML += `<a href="dashboard">DashBoard</a>`
            navbarLinks.innerHTML += `<a href="profile?user_id=${id}">Profile</a>`
            navbarLinks.innerHTML += `<a href="order">Order</a>`
            navbarLinks.innerHTML += `<a href="home&disconnect=true">Logout</a>`
        } else if (isUser(user)) {
            navbarLinks.innerHTML += `<a href="home">Home</a>`
            navbarLinks.innerHTML += `<a href="dashboard">DashBoard</a>`
            navbarLinks.innerHTML += `<a href="reservation">reservation</a>`
            navbarLinks.innerHTML += `<a href="profile?user_id=${id}">Profile</a>`
            navbarLinks.innerHTML += `<a href="order">Order</a>`
            navbarLinks.innerHTML += `<a href="home&disconnect=true">Logout</a>`
        } else if (isGuest(user)) {
            navbarLinks.innerHTML += `<a href="home">Home</a>`
            navbarLinks.innerHTML += `<a href="inscription">Register</a>`
            navbarLinks.innerHTML += `<a href="login">Login</a>`
            navbarLinks.innerHTML += `<a href="#">Contact</a>`
        }
    })
</script>