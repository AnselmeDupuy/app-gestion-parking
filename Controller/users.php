<?php
/**
 * @var PDO $pdo
 */
require "Model/users.php";
require "Model/profile.php";

$search = isset($_POST['search']) ? cleanString($_POST['search']) : null;
$users = getAll($pdo,  $search);
$usersCount = countUsers($pdo);

var_dump($usersCount); 

if(isset($_GET['action']) && ($_GET['action'] === 'toggle_enabled')) 
{
    $user = getUserById($pdo, $_GET['id']);
    logAction($pdo, 'Activating/deactivating account', "admin : ".$_SESSION['user_id']." used action on user: ".$user['id']." state: ".$user['is_active']);
    toggle_enabled($pdo, $user['id']);
    header('Location: users');
    exit();
}

require "View/users.php";