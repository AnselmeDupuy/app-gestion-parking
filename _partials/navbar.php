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
            navbarLinks.innerHTML += `<a href="index.php?component=home">Home</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=logs">Logs</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=users">Users</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=home&disconnect=true">Logout</a>`
        } else if (isUser(user)) {
            navbarLinks.innerHTML += `<a href="index.php?component=home">Home</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=dashboard">DashBoard</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=profile">Profile</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=home&disconnect=true">Logout</a>`
        } else if (isGuest(user)) {
            navbarLinks.innerHTML += `<a href="index.php?component=home">Home</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=inscription">Register</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=login">Login</a>`
            navbarLinks.innerHTML += `<a href="index.php?component=contact">Contact</a>`
        }
    })
</script>