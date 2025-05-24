<?php
    session_start();

    require "includes/function.php";
    require "includes/logs.php";
    require  './vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(".");
    $dotenv->safeLoad();
    $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
 
    $adminPages = ['users', 'logs', 'reservation', 'parkings'];
    $userPages = ['profile', 'dashboard', 'reservation', 'edit-profile'];
    $guestPages = ['home', 'login', 'inscription', 'contact', 'admin-login'];

    require "includes/database.php";

    $errors = [];
    if(isset($_GET["disconnect"])) {
        logAction($pdo , "User disconnected", $_SESSION['email']." disconnected from the site");
        session_destroy();
        header("Location: home");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo $basePath; ?>">
    <link rel="stylesheet" href="includes/fontawesome-free-6.7.1-web/css/all.min.css"/>
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/componentsCss/components.css" rel="stylesheet">

    <title>Parking Management</title>
</head>
<body data-bs-theme="dark">
    <header>
    <?php require "_partials/navbar.php"; ?>
    </header>
    <main>
        <?php
            $componentName = isset($_GET["component"]) ? cleanString($_GET["component"]) : "home";

            if (!file_exists("Controller/$componentName.php")) {
                    logAction($pdo , "Accessed site", 'accessed $_GET["component"]');
                $componentName = "home";
            }

            if (in_array($componentName, $adminPages)) {
                if (isAdmin()) {
                    require "Controller/$componentName.php";
                } else {
                    $errors[] = "Access denied: Admin only.";
                    require "Controller/home.php";
                }

            } elseif (in_array($componentName, $userPages)) {
                if (isUser() || isAdmin()) {
                    require "Controller/$componentName.php";
                } else {
                    $errors[] = "You must be logged in to access this page.";
                    require "Controller/home.php";
                }

            } elseif (in_array($componentName, $guestPages)) {
                if (isGuest() || isUser() || isAdmin()) {
                    require "Controller/$componentName.php";
                } else {
                    header("Location: home");
                    exit();
                }

            } else {
                require "Controller/home.php";
            }
        ?>
    </main>
    <footer>
        <?php require "_partials/footer.php"; ?>
    </footer>
    <script src="includes/js/bootstrap.js"></script>
</body>
</html>