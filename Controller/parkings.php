<?php
/**
 * @var PDO $pdo
 */
require "Model/reservation.php";
require "Model/parkings.php";

$freeParkings = getFreeParkings($pdo);
$parkings = getAllParkings($pdo);
$electricParkings = getElectricParkings($pdo);
$handiParkings = getHandiParkings($pdo);


require "View/parkings.php";