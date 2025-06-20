<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require_once "Model/reservations.php";


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['status']) && isset($_GET['page'])) {
        $search = isset($_GET['search']) ? cleanString($_GET['search']) : null;
        $page = cleanString($_GET['page']) ?? 1;
        $status = $_GET['status'];
        $result = getAllReservations($pdo, $status, $search, 10, $page);
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'reservations' => $result]);
        exit;
    }


    if(isset($_GET['delete']) && isset($_GET['reservationId'])) {
        $reservationId = cleanString($_GET['reservationId']);
        $result = cancelReservation($pdo, $reservationId);
        if($result) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Reservation cancelled successfully']);
        } else {
            header('Content-Type: application/json', true, 500);
            echo json_encode(['success' => false, 'message' => 'Failed to cancel reservation']);
        }
        exit;
    }
}


require "View/reservations.php";