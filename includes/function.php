<?php

function cleanString(string $value): string
    {
        return trim(htmlspecialchars($value, ENT_QUOTES));
    }

function logAction(PDO $pdo, string $action, string $details = "no details"): void {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if (!empty($_SESSION)){
        $userId = $_SESSION['auth']['id'];
    } else {
        $userId = null;
    }

    if (!empty($_SESSION['User-Agent'])){
        $userAgent = $_SESSION['User-Agent'];
    } else {
        $userAgent = null;
    }


    $stmt = $pdo->prepare("INSERT INTO logs (`client_ip`, `user_id`, `user_agent`, `action`, `action_details`) VALUES (:ip, :userId, :userAgent, :action, :details)");
    $stmt->bindValue(':ip', $ip);
    $stmt->bindValue(':userId', $userId);
    $stmt->bindValue(':userAgent', $userAgent);
    $stmt->bindValue(':action', $action);
    $stmt->bindValue(':details', $details);
    $stmt->execute();
    $stmt->closeCursor();
    
}

?>