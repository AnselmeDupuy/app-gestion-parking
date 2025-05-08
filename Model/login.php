<?php
/**
 * @var PDO $pdo
 */
function getUser(string $email, PDO $pdo):array | bool
{
    $state = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $state->bindParam(':email', $email);
    $state->execute();
    return $state->fetch();
}