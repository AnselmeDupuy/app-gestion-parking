<?php
/**
 * @var PDO $pdo
 */
require "Model/profile.php";


$user = getUserById($pdo, $_SESSION['user_id']);




require "View/profile.php";
