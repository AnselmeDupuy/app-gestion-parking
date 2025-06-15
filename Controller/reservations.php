<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require_once "Model/reservations.php";



if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['status'])) {
        $status = $_GET['status'];
        $result = getAllReservations($pdo, $status);
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'reservations' => $result]);
        exit;
    }

}


require "View/reservations.php";