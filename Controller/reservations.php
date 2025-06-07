<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require_once "Model/reservations.php";

$reservations = getAllReservations($pdo);


require "View/reservations.php";