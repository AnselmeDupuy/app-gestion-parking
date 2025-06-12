<?php
global $pdo;
global $todayPrice;

/**
 * @var PDO $pdo
 */

require_once "Model/order.php";
require_once "Model/dashboard.php";

$reservations = getReservationsByUser($pdo, $_SESSION['user_id']);
foreach ($reservations as $reservation) {
    $reservation['start_time'] = date('Y-m-d H:i', strtotime($reservation['start_time']));
    $reservation['end_time'] = date('Y-m-d H:i', strtotime($reservation['end_time']));

    $dateTime = new DateTime($reservation['start_time']);

    $duration = getDuration($reservation['start_time'], $reservation['end_time']);

    $price = calculatePrice($reservation['start_time'], $reservation['end_time'], $todayPrice);
}

// header('Content-Type: application/json');

// $data = json_decode(file_get_contents('php://input'), true);
// $orderId = $data['orderId'] ?? null;

// if ($orderId) {
//     $stmt = $pdo->prepare("UPDATE reservations SET paid = 1 WHERE id = :id");
//     $stmt->bindValue(':id', $orderId, PDO::PARAM_INT);
//     $success = $stmt->execute();

//     echo json_encode(['success' => $success]);
// } else {
//     echo json_encode(['success' => false, 'message' => 'Missing order ID']);
// }




require "View/order.php";