    <h2>ParkingSpot Manager</h2>
    <nav class="navbarLinks">

    </nav>
  <script type="module">
    import { getUser, isAdmin, isUser, isGuest } from "./assets/services/navBar.js"

    const user = "<?php echo isset($_SESSION['group']) ? $_SESSION['group'] : 'guest'; ?>"
    console.log(user)

    document.addEventListener('DOMContentLoaded', async () => {
        const navbarLinks = document.querySelector('.navbarLinks')

        if (isAdmin(user)) {
            navbarLinks.innerHTML += `<a href="home">Home</a>`
            navbarLinks.innerHTML += `<div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Admin panel
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="logs">Logs</a></li>
                                                <li><a class="dropdown-item" href="users">Users</a></li>
                                            </ul>
                                       </div>`
            navbarLinks.innerHTML += `<a href="reservations">Reservations</a>`
            navbarLinks.innerHTML += `<a href="reservation">My reservation</a>`
            navbarLinks.innerHTML += `<a href="dashboard">DashBoard</a>`
            navbarLinks.innerHTML += `<a href="profile">Profile</a>`
            navbarLinks.innerHTML += `<a href="parkings">Parking Spots</a>`
            navbarLinks.innerHTML += `<a href="home&disconnect=true">Logout</a>`
        } else if (isUser(user)) {
            navbarLinks.innerHTML += `<a href="home">Home</a>`
            navbarLinks.innerHTML += `<a href="dashboard">DashBoard</a>`
            navbarLinks.innerHTML += `<a href="profile">Profile</a>`
            navbarLinks.innerHTML += `<a href="home&disconnect=true">Logout</a>`
        } else if (isGuest(user)) {
            navbarLinks.innerHTML += `<a href="home">Home</a>`
            navbarLinks.innerHTML += `<a href="inscription">Register</a>`
            navbarLinks.innerHTML += `<a href="login">Login</a>`
            navbarLinks.innerHTML += `<a href="#">Contact</a>`
        }
    })
</script>