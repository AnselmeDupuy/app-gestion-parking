<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require_once "Model/reservation.php";
require_once "Model/profile.php";
require_once "Model/dashboard.php";

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' && isset($_POST['add_reservation'])) {
    $date = cleanString($_POST['reservation_date']) ?? null;
    $startTime = cleanString($_POST['reservation_start_time']) ?? null;
    $endTime = cleanString($_POST['reservation_end_time']) ?? null;
    $vehicleId = cleanString($_POST['vehicle_id']) ?? null;
    $type = cleanString($_POST['parking_type']) ?? null;
    if ($type !== 'basic' && $type !== 'handicapped' && $type !== 'electric') {
        $type = null;
    };
    $status = $_SESSION['subscription_status'];
    $userId = $_SESSION['user_id'] ?? null;
    $dateCheck = true;

    $startDateTime = "$date"." "."$startTime";
    $endDateTime = "$date"." "."$endTime";

    if (date($startDateTime) > date($endDateTime) || date($startDateTime) === date($endDateTime)) {
        $dateCheck = false;
        logAction($pdo, 'add_reservation', "start time is after end time for user ID: $userId");
        header('Content-Type: application/json', true, 400);
        echo json_encode(['success' => false, 'message' => 'Incorrect start or end time.']);
        exit();
    } else if (date($startDateTime) < date('Y-m-d H:i:s') || date($endDateTime) < date('Y-m-d H:i:s')) {
        $dateCheck = false;
        logAction($pdo, 'add_reservation', " $startDateTime or $endTime  in the past for user ID: $userId");
        header('Content-Type: application/json', true, 400);
        echo json_encode(['success' => false, 'message' => 'Reservation cannot be in the past.']);
        exit();
    } else  

    if ($startDateTime && $endDateTime && $vehicleId && $userId && $dateCheck === true) {

        $getFreeParking = getParkingSpotAvailable($pdo, date($startDateTime), date($endDateTime), $type, $status);

        if($getFreeParking['count'] === 0) {
            $getFreeParking = getParkingSpotAvailable($pdo, date($startDateTime), date($endDateTime), $type, 'free');
            if ($getFreeParking['count'] === 0) {
                logAction($pdo, 'add_reservation', "no more places for $type parking for user ID: $userId");
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'No available parking spots for the selected type at the time.']);
                exit();
            }
            $parkingId = $getFreeParking['parkings'][0]['id'];
        } else {
            $parkingId = $getFreeParking['parkings'][0]['id'];
        }


        if ($parkingId === 0) {
            logAction($pdo, 'add_reservation', "no more places for ". "$type" . " parking for user ID: $userId");
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'No available parking spots for the selected type at the time.']);
            exit();
        }
        if (addReservation($pdo, $userId, $vehicleId, $startDateTime, $endDateTime, $parkingId)) {
            logAction($pdo, 'add_reservation', "User ID: $userId reserved place: $parkingId from $startDateTime to $endDateTime");
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
        logAction($pdo, 'add_reservation', "Invalid input data for user ID: $userId");
        header('Content-Type: application/json', true, 400);
        echo json_encode(['success' => false, 'message' => 'Invalid input data.']);
        exit();
    }

}

$cars = getCarsByUser($pdo, $_SESSION['user_id']);


require_once "View/reservation.php";