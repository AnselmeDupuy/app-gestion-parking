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
        
    if ($password !== $confirmation) {
        $errors[] = "Le mot de passe et sa confirmation sont différents";
        logAction($pdo, $action, $errors[0]);
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $newUser = addUser($pdo, $password, $email, $phone, $firstName, $lastName);

        $details = !empty($newUser) ? "User created successfully" : "User creation failed";
        logAction($pdo, $action, $details);


        if ($newUser === true) {
            header("Location: index.php");
            exit();
        } else {
            $errors[] = $newUser;
            $details = !empty($newUser) ? "User creation failed" : "User created successfully";
            logAction($pdo, $action, $details);
        }
    }
}





require "View/inscription.php";
