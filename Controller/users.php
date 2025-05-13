<?php
/**
 * @var PDO $pdo
 */
require "Model/users.php";

    $search = isset($_POST['search']) ? cleanString($_POST['search']) : null;

    $users = getAll($pdo,  $search);



require "View/users.php";
