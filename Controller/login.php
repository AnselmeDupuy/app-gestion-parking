<?php
/**
 * @var PDO $pdo
 */
require "Model/login.php";

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'
) {
    $email = !empty($_POST['email']) ? $_POST['email'] : null;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    if($email !== null && $password !== null && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = cleanString($email);
        $password = cleanString($password);

        $user = getUser($email, $pdo);
        if(is_array($user)){
            $isMatchPassword = is_array($user) && password_verify($password, $user['password']);

            if($isMatchPassword && $user['is_active'] && is_array($user)){
                $_SESSION['auth'] = true;
                $_SESSION['email'] = $user['email'];
                $_SESSION['userId'] = $user['id'];
                $_SESSION['role'] = $user['group_id'] == 2 ? 'admin' : 'user';
                $_SESSION['password'] = $user['password'];
                $_SESSION['client_IP'] = $_SERVER['REMOTE_ADDR'];

                exit();
            } elseif (!$user['is_active'] && $isMatchPassword && is_array($user)){
                $errors[] = "Votre compte est desactivé";
            } else {
                $errors[] = "Authentification invalide";
            }
        } else {
            $errors[] = "Utilisateur invalide";
        }
    } else {
        $_SESSION['auth'] = false;
        $_SESSION['email'] = null;
        $_SESSION['client_IP'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['role'] = 'guest';
        $_SESSION['password'] = null;
        
    }

    if(!empty($errors)){
        header("Content-type: application/json");
        echo json_encode(['errors' => $errors]);
        exit;
    }
}


require "View/login.php";