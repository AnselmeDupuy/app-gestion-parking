<?php
    session_start();



    function customError($errno, $errstr) {
        echo "<b>Error:</b> [$errno] $errstr";
    }

    set_error_handler("customError", E_ALL);

    require "includes/function.php";
    require "includes/logs.php";
    require  './vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(".");
    $dotenv->safeLoad();
    $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
    
 
    $adminPages = ['users', 'logs', 'reservation', 'parkings', 'profile', 'dashboard', 'reservation', 'edit-profile', 'home', 'login', 'inscription', 'contact', 'admin-login', 'reservations', 'reservation'];
    $userPages = ['profile', 'dashboard', 'reservation', 'edit-profile', 'home', 'login', 'inscription', 'contact', 'admin-login'];
    $guestPages = ['home', 'login', 'inscription', 'contact', 'admin-login'];

    require "includes/database.php";

    $componentName = isset($_GET["component"]) ? cleanString($_GET["component"]) : "home";

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {

            if (!file_exists("Controller/$componentName.php")) {
                http_response_code(403);
                header('Location: home');
            }

            if (isAdmin()) {
                    controller($componentName, $adminPages);
            } elseif (isUser() || isAdmin()) {
                    controller($componentName, $userPages);
            } elseif (isGuest() || isUser() || isAdmin()) {
                controller($componentName, $guestPages);
            } else {
                http_response_code(403);
                header('Location: home');
                exit();
            } 
    }

    $errors = [];
    if(isset($_GET["disconnect"])) {
        logAction($pdo , "Logout", $_SESSION['email']." disconnected from the site");
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
    <link href="includes/fontawesome-free-6.7.1-web/css/all.min.css" rel="stylesheet">
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

            if (!file_exists("Controller/$componentName.php")) {
                http_response_code(403);
                header('Location: home');
            }

            if (isAdmin()) {
                    controller($componentName, $adminPages);
            } elseif (isUser() || isAdmin()) {
                    controller($componentName, $userPages);
            } elseif (isGuest() || isUser() || isAdmin()) {
                controller($componentName, $guestPages);
            } else {
                http_response_code(403);
                header('Location: home');
                exit();
            } 
        ?>
    </main>
    <footer>
        <?php require "_partials/footer.php"; ?>
    </footer>
    <script src="includes/js/bootstrap.bundle.min.js"></script>
</body>
</html>