<?php
/**
 * @var PDO $pdo
 */
require "Model/inscription.php";

$action = "inscription Form";

if (isset($_POST["create_user_button"])) {
    $password = !empty($_POST['password']) ? cleanString($_POST['password']) : null;
    $confirmation = !empty($_POST['password-confirm']) ? cleanString($_POST['password-confirm']) : null;
    $email = !empty($_POST['email']) ? cleanString($_POST['email']) : null;
    $firstName = !empty($_POST['first-name']) ? cleanString($_POST['first-name']) : null;
    $lastName = !empty($_POST['last-name']) ? cleanString($_POST['last-name']) : null;
    $phone = !empty($_POST['phone']) ? cleanString($_POST['phone']) : null;
    
    logAction($pdo, $action);
    
    if ($password !== $confirmation) {
        $errors[] = "Le mot de passe et sa confirmation sont différents";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $newUser = addUser($pdo, $password, $email, $phone, $firstName, $lastName);

        if ($newUser === true) {
            header("Location: index.php");
            exit();
        } else {
            $errors[] = $newUser;
        }
    }
}





require "View/inscription.php";
