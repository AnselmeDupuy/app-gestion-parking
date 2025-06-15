<?php
global $pdo;
global $todayPrice;
/**
 * @var PDO $pdo
 */
require_once "Model/dashboard.php";

$reservations = getReservationsByUserConfirmed($pdo, $_SESSION['user_id']);
foreach ($reservations as $reservation) {
    $reservation['start_time'] = date('Y-m-d H:i', strtotime($reservation['start_time']));
    $reservation['end_time'] = date('Y-m-d H:i', strtotime($reservation['end_time']));

    $dateTime = new DateTime($reservation['start_time']);

    $duration = getDuration($reservation['start_time'], $reservation['end_time']);

    $price = calculatePrice($reservation['start_time'], $reservation['end_time'], $todayPrice);
}

require "View/dashboard.php";