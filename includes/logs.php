<?php
/**
 * @var PDO $pdo
 */
function logAction(PDO $pdo, string $action, ?string $details = "no details"): void {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if (!empty($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    } else {
        $userId = null;
    }

    if (!empty($_SERVER['HTTP_USER_AGENT'])){
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
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

        

    $logLine = sprintf(
        "[%s] IP: %s | User: %s | Action: %s | Details: %s | UA: %s\n",
        date('Y-m-d H:i:s'),
        $ip,
        $userId,
        $action,
        $details,
        $userAgent
    );

    file_put_contents('/var/www/logs/actions.log', $logLine, FILE_APPEND | LOCK_EX);
}
