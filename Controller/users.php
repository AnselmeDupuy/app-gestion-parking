<?php
global $pdo;
/**
 * @var PDO $pdo
 */
require "Model/users.php";
require "Model/profile.php";

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    
    if (isset($_GET['action']) && $_GET['action'] === 'toggle' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = cleanString($_GET['id']);
        $result = toggle_enabled($pdo, $id);
        if ($result) {
            logAction($pdo, 'activate/deActivate', "user $id status changed by admin : " . $_SESSION['user_id']);
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'User status toggled successfully.']);
        } else {
            logAction($pdo, 'toggle_user_status', "Failed to deActivate/activate user ID: $id by admin: " . $_SESSION['user_id']);
            header('Content-Type: application/json', true, 500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to toggle user status.']);
        }
        exit();
    } elseif (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = cleanString($_GET['id']);
        $result = deleteUser($pdo, $id);
        if ($result) {
            logAction($pdo, 'delete_user', "user $id deleted by admin: " . $_SESSION['user_id']);
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'User deleted successfully.']);
        } else {
            logAction($pdo, 'delete_user', "Failed to delete user ID: $id by admin: " . $_SESSION['user_id']);
            header('Content-Type: application/json', true, 500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete user.']);
        }
        exit();
    }
    
    $search = isset($_GET['search']) ? cleanString($_GET['search']) : null;
    $page = cleanString($_GET['page']) ?? 1;
    $users = countUsers($pdo,  $search, 10, $page);
    header('Content-Type: application/json');
    echo json_encode($users);
    exit();
}

require "View/users.php";