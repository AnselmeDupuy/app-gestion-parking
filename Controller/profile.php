<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require_once "Model/profile.php";


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' && isset($_SESSION['user_id']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = $_SESSION['user_id'];

    $result = getUserById($pdo, $userId);
    if ($result) {
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'user' => $result]);
        exit();
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'User not found']);
        exit();
    }
}

if(
    !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
    && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' 
    && isset($_SESSION['user_id']) 
    && $_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['edit_profile'])) {


    $userId = $_SESSION['user_id'];
    $firstName = $_POST['first_name'] ?? null;
    $lastName = $_POST['last_name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;

    if ($firstName && $lastName && $email) {
        $result = updateInfo($pdo, $firstName, $lastName, $email, $phone, $userId);
        if ($result) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
            exit();
        }
    }
}

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
