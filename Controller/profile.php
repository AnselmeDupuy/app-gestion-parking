<?php
/**
 * @var PDO $pdo
 */
require "Model/profile.php";


$user = getUserById($pdo, $_SESSION['user_id']);
$cars = getCarsByUser($pdo, $_SESSION['user_id']);
if (isset($_POST['create-car'])) {
    $carName = $_POST['car-name'];
    $licensePlate = $_POST['license-plate'];
    addCar($pdo, $_SESSION['user_id'], $licensePlate, $carName);
    header('Location: profile');
}

if (isset($_GET['action']) && $_GET['action'] === 'remove-car') {
    $carId = $_GET['car-id'];
    removeCar($pdo, $carId);
    header('Location: profile');
}




require "View/profile.php";
