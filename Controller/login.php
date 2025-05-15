<?php
/**
 * @var PDO $pdo
 */
require "Model/login.php";

if (isset($_POST["login_button"])) {
    $action = 'login';
    $email = !empty($_POST['email']) ? $_POST['email'] : null;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    if($email !== null && $password !== null && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = cleanString($email);
        $password = cleanString($password);

        $user = getUser($email, $pdo);
        if(is_array($user)){
            $isMatchPassword = is_array($user) && password_verify($password, $user['password']);

            if($isMatchPassword && $user['is_active'] === 1 && is_array($user)){
                $_SESSION['auth'] = true;
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['group'] = $user['group_id'] == 2 ? 'admin' : 'user';
                $_SESSION['first_name'] = $user['firstName'];
                $_SESSION['last_name'] = $user['lastName'];
                $_SESSION['phone'] = $user['phone'];

                $details = "Login successful";
                logAction($pdo, $action, $details);

                header("Location: home");

                exit();
            } elseif ($user['is_active'] !== 1 && $isMatchPassword && is_array($user)){
                $errors[] = "account is inactive";
                $details = "Login attempt failed, account is inactive";
                logAction($pdo, $action, $details);
            } else {
                $errors[] = "authentication failed, invalid password";
                $details = "Login attempt failed, invalid password";
                logAction($pdo, $action, $details);
            }
        } else {
            $errors[] = "user invalid";
            $details = "Login attempt failed, invalid user";
            logAction($pdo, $action, $details);
        }
    } else {
        $errors[] = "authentication failed, missing input";
        $details = "Login attempt failed, missing input";
        logAction($pdo, $action, $details);
    }
}


require "View/login.php";