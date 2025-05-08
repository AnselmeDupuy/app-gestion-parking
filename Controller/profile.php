<?php
/**
 * @var PDO $pdo
 */
require "Model/profile.php";


$user = getUserById($pdo, 1);




require "View/profile.php";
