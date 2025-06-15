<?php
global $pdo;
global $todayPrice;

/**
 * @var PDO $pdo
 */

require_once "Model/order.php";
require_once "Model/dashboard.php";



if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $paypalClientId = $_ENV['PAYPAL_CLIENT_ID'];
    $userId = $_SESSION['user_id'];

    if (isset($_GET['action']) && $_GET['action'] === 'cancel' && isset($_GET['reservationId'])) {
        $id = cleanString($_GET['reservationId']);
        $result = cancelReservation($pdo, $id);
        if ($result) {
        logAction($pdo, 'cancel Order', "user $userId canceled reservation: $id");
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'orders' => $id]);
        exit;
        }
    } 
    
    $reservations = getReservationsByUserWaiting($pdo, $_SESSION['user_id']);

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'orders' => $reservations]);
    exit;
}

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'confirm' && isset($_POST['reservationId'])) {
        $id = cleanString($_POST['reservationId']);
        $result = reservationUpdate($pdo, $id);
        $userId = $_SESSION['user_id'];

        if ($result) {
        logAction($pdo, 'Confirm Order', "user $userId confirmed reservation: $id");
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'orders' => $id]);
        exit;
        }
    }
    $reservations = getReservationsByUserWaiting($pdo, $_SESSION['user_id']);

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'orders' => $reservations]);
    exit;
}


require "View/order.php";
