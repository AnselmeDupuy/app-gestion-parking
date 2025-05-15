    <h2>ParkingSpot Manager</h2>
    <nav class="navbarLinks">

    </nav>
  <script type="module">
    import { getUser, isAdmin, isUser, isGuest } from "./assets/services/navBar.js"

    const user = "<?php echo isset($_SESSION['group']) ? $_SESSION['group'] : 'guest'; ?>"
    console.log(user);

    document.addEventListener('DOMContentLoaded', async () => {
        const navbarLinks = document.querySelector('.navbarLinks')

        if (isAdmin(user)) {
            navbarLinks.innerHTML += `<a href="home">Home</a>`
            navbarLinks.innerHTML += `<a href="logs">Logs</a>`
            navbarLinks.innerHTML += `<a href="users">Users</a>`
            navbarLinks.innerHTML += `<a href="dashboard">DashBoard</a>`
            navbarLinks.innerHTML += `<a href="profile">Profile</a>`
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
            navbarLinks.innerHTML += `<a href="contact">Contact</a>`
        }
    })
</script>