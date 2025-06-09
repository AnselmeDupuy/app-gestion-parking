<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require_once "Model/dashboard.php";

$prices = getPrices($pdo);
$day = $prices[0]['price'] ?? 0;
$night = $prices[1]['price'] ?? 0;
$weekEnd = $prices[2]['price'] ?? 0;
$specialPrice = $prices[3]['price'] ?? 0;

$reservations = getReservationsByUser($pdo, $_SESSION['user_id']);
foreach ($reservations as $reservation) {
    $reservation['start_time'] = date('Y-m-d H:i', strtotime($reservation['start_time']));
    $reservation['end_time'] = date('Y-m-d H:i', strtotime($reservation['end_time']));

    $dateTime = new DateTime($reservation['start_time']);
    var_dump($reservation, $dateTime->format('D'));

    // var_dump($price = calculatePrice($reservation['start_time'], $reservation['end_time'], $night));
}
// Mon, Tue, Wed, Thur, Fri, Sat, Sun Format ??



require "View/dashboard.php";