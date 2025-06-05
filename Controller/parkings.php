<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require "Model/parkings.php";

$freeParkings = getFreeParkings($pdo);
$parkings = getAllParkings($pdo);
$electricParkings = getElectricParkings($pdo);
$handiParkings = getHandiParkings($pdo);


require "View/parkings.php";