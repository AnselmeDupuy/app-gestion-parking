<?php

function addUser(PDO $pdo, $password, $email, $phone, $firstName, $lastName){

        if (empty($password) || empty($email) || empty($phone) || empty($firstName) || empty($lastName)) {
            $errors[] = "Please fill all fields";
        } else {
            try {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->prepare("INSERT INTO `users` (`password`, `email`, `phone`, `firstName`, `surName`, `group_id`) VALUES (:password, :email, :phone, :firstName, :lastName, :group_id)");
                $stmt->bindValue(':password', $password);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':firstName', $firstName);
                $stmt->bindValue(':lastName', $lastName);
                $stmt->bindValue(':group_id', 1);
                $stmt->execute();
                $stmt->closeCursor();

                header("Location: home");
                return true;
            } catch (Exception $e) {
                $errors[] = "Error adding user: " . $e->getMessage();
            }
        }
    }

?>