<link href="includes/componentsCss/partials.css" rel="stylesheet">
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
            navbarLinks.innerHTML += `<a href="index/home">Home</a>`
            navbarLinks.innerHTML += `<a href="index/logs">Logs</a>`
            navbarLinks.innerHTML += `<a href="index/users">Users</a>`
            navbarLinks.innerHTML += `<a href="index/dashboard">DashBoard</a>`
            navbarLinks.innerHTML += `<a href="index/profile">Profile</a>`
            navbarLinks.innerHTML += `<a href="index/home&disconnect=true">Logout</a>`
        } else if (isUser(user)) {
            navbarLinks.innerHTML += `<a href="index/home">Home</a>`
            navbarLinks.innerHTML += `<a href="index/dashboard">DashBoard</a>`
            navbarLinks.innerHTML += `<a href="index/profile">Profile</a>`
            navbarLinks.innerHTML += `<a href="index/home&disconnect=true">Logout</a>`
        } else if (isGuest(user)) {
            navbarLinks.innerHTML += `<a href="index.php/home">Home</a>`
            navbarLinks.innerHTML += `<a href="index/inscription">Register</a>`
            navbarLinks.innerHTML += `<a href="index/login">Login</a>`
            navbarLinks.innerHTML += `<a href="index/contact">Contact</a>`
        }
    })
</script>