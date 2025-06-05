<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require "Model/dashboard.php";

$reservations = getReservationsByUser($pdo, $_SESSION['user_id']);
var_dump($reservations);

require "View/dashboard.php";