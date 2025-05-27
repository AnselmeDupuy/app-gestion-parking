<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require "Model/logs.php";

$search = isset($_GET['search']) ? cleanString($_GET['search']) : null;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    $logs = countLogs($pdo, $search, 20, $page);
    header('Content-Type: application/json');
    echo json_encode($logs);
    exit();
}

require "View/logs.php";
