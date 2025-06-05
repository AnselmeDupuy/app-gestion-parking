<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require "Model/reservations.php";

$reservations = getAllReservations($pdo);


require "View/reservations.php";