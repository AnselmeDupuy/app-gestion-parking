<?php
    session_start();

    require "includes/function.php";
    require  './vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(".");
    $dotenv->safeLoad();

    // var_dump($_SESSION); //DEBUG
    // var_dump($_SERVER); //DEBUG

    require "includes/database.php";

    $errors = [];
    // if(isset($_GET["disconnect"])) {
    //     session_destroy();
    //     header("Location: index.php");
    //     exit();
    // }
    // if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    //     $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'
    // )
    // {
    //     if(isset($_SESSION['auth'])) {
    //         if(isset($_GET["component"])){
    //             $componentName = cleanString($_GET["component"]);
    //             if(file_exists("Controller/$componentName.php")){
    //                 require "Controller/$componentName.php";
    //             }
    //         }
    //     } else {
    //         require "Controller/login.php";
    //     }
    //     exit();
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <link rel="stylesheet" href="includes/fontawesome-free-6.7.1-web/css/all.min.css"/>
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">

    <title>Parking Management</title>
</head>
<body data-bs-theme="dark">
    <header>
    <?php require "_partials/navbar.php"; ?>
    </header>
    <main>
            <?php
                // require "_partials/navbar.php";

                // if(isset($_GET["component"])){
                //     $componentName = cleanString($_GET["component"]);
                //     if(file_exists("Controller/$componentName.php")){
                //         require "Controller/$componentName.php";
                //     }
                // } 
                // require "Controller/home.php";
                // require "Controller/parkings.php";

                require "Controller/inscription.php";
                // require "Controller/login.php";
                // require "Controller/profile.php";
                require "Controller/users.php";

                // require "Controller/adminParkings.php";

                // require "Controller/dashboard.php";

                // require "Controller/subscription.php";
                // require "Controller/reservation.php";

            
            // require "_partials/errors.php";
            ?>
    </main>
    <footer>
        <?php require "_partials/footer.php"; ?>
    </footer>
    <script src="includes/js/bootstrap.js"></script>
</body>
</html>