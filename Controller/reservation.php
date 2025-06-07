<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require_once "Model/reservation.php";
require_once "Model/profile.php";

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' && isset($_POST['add_reservation'])) {
    $date = cleanString($_POST['reservation_date']) ?? null;
    $startTime = cleanString($_POST['reservation_start_time']) ?? null;
    $endTime = cleanString($_POST['reservation_end_time']) ?? null;
    $vehicleId = cleanString($_POST['vehicle_id']) ?? null;
    $userId = $_SESSION['user_id'] ?? null;

    if ($date && $startTime && $endTime && $vehicleId && $userId) {
        $startDateTime = "$date"." "."$startTime";
        $endDateTime = "$date"." "."$endTime";

        if (addReservation($pdo, $userId, $vehicleId, $startDateTime, $endDateTime)) {
            logAction($pdo, 'add_reservation', "User ID: $userId reserved vehicle ID: $vehicleId from $startDateTime to $endDateTime");
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Reservation added successfully.']);
            exit();
        } else {
            logAction($pdo, 'add_reservation', "Failed to add reservation for user ID: $userId for vehicle ID: $vehicleId");
            header('Content-Type: application/json', true, 500);
            echo json_encode(['success' => false, 'message' => 'Failed to add reservation.']);
            exit();
        }
    } else {
        header('Content-Type: application/json', true, 400);
        echo json_encode(['success' => false, 'message' => 'Invalid input data.']);
        exit();
    }

}

$cars = getCarsByUser($pdo, $_SESSION['user_id']);


require_once "View/reservation.php";