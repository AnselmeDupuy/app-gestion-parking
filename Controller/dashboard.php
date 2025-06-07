<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require_once "Model/dashboard.php";

$reservations = getReservationsByUser($pdo, $_SESSION['user_id']);
$freeSpots = getParkingSpotAvailable($pdo, date('Y-m-d H:i:s'));


require "View/dashboard.php";