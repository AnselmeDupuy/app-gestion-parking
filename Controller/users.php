<?php
/**
 * @var PDO $pdo
 */
require "Model/users.php";

    $users = getAll($pdo);

require "View/users.php";
