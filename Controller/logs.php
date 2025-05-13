<?php
/**
 * @var PDO $pdo
 */
require "Model/logs.php";

$search = isset($_POST['search']) ? cleanString($_POST['search']) : null;
$logs = getAll($pdo, $search);




require "View/logs.php";
