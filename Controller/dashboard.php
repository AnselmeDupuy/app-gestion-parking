<?php
global $pdo;
global $todayPrice;
/**
 * @var PDO $pdo
 */
require_once "Model/dashboard.php";

    $week = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];

    $prices = getPrices($pdo);

$reservations = getReservationsByUserConfirmed($pdo, $_SESSION['user_id']);
foreach ($reservations as $reservation) {
    $reservation['start_time'] = date('Y-m-d H:i', strtotime($reservation['start_time']));
    $reservation['end_time'] = date('Y-m-d H:i', strtotime($reservation['end_time']));

    $dateTime = new DateTime($reservation['start_time']);

    $duration = getDuration($reservation['start_time'], $reservation['end_time']);

    $day = $dateTime->format('D');
    $hour = $dateTime->format('H');

    if (in_array($day, $week)) {
        if ($hour >= 8 && $hour <= 22) {
            $pricing = $prices[0]['price'];
        } else {
            $pricing = $prices[1]['price'];
        }
    } elseif (in_array($day, $weekEnd)) {
        $pricing = $prices[2]['price'];
    } else {
        $pricing = null;
        logAction($pdo, 'Get Price', 'Failed to associate a price with today\'s date: '.$pricing);
    }


    $price = calculatePrice($reservation['start_time'], $reservation['end_time'], $pricing);
}

require "View/dashboard.php";