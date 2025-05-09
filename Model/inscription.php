<?php

function addUser(PDO $pdo, $password, $email, $phone, $firstName, $lastName){
    if (isset($_POST["create_user_button"])) {  
        $errors = [];

        $password = cleanString($_POST["password"]);
        $email = cleanString($_POST["email"]);
        $phone = cleanString($_POST["phone"]);
        $firstName = cleanString($_POST["first-name"]);
        $lastName = cleanString($_POST["last-name"]);


        if (empty($password) || empty($email) || empty($phone) || empty($firstName) || empty($lastName)) {
            $errors[] = "Please fill all fields";
        } else {
            try {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->prepare("INSERT INTO `users` (`password`, `email`, `phone`, `firstName`, `lastName`) VALUES (:password, :email, :phone, :firstName, :lastName)");
                $stmt->bindValue(':password', $password);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':firstName', $firstName);
                $stmt->bindValue(':lastName', $lastName);
                $stmt->execute();
                $stmt->closeCursor();

                header("Location: index.php");
                exit();
            } catch (Exception $e) {
                $errors[] = "Error adding user: " . $e->getMessage();
            }
        }
    }
}

?>