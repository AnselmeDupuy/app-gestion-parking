<?php
/**
 * @var PDO $pdo
 */
require "Model/reservation.php";

getFreeParkings($pdo);
$parkings = getAllParkings($pdo);
getElectricParkings($pdo);
getHandiParkings($pdo);



require "View/reservation.php";