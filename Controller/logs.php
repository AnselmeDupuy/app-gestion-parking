<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require "Model/logs.php";


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    $search = isset($_GET['search']) ? cleanString($_GET['search']) : null;
    $page = cleanString($_GET['page']) ?? 1;
    $logs = countLogs($pdo, $search, 10, $page);
    header('Content-Type: application/json');
    echo json_encode($logs);
    exit();
}

require "View/logs.php";
