<?php
/**
 * @var PDO $pdo
 */
require "Model/logs.php";


$logs = getAll($pdo);




require "View/logs.php";
