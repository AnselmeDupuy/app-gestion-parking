<?php
$host = 'localhost';
$dbname = 'parking_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $numberOfSpaces = 50;
    $electricFreeCount = 0;
    $electricPremiumCount = 0;  


    $stmt = $pdo->prepare("INSERT INTO parkings (place_number, type, status) VALUES (:place_number, :type, :status)");

    for ($i = 1; $i <= $numberOfSpaces; $i++) {
        if ($i <= 10) {
            $type = 'handicapped';
            $status = 'free';
        } elseif ($electricFreeCount < 5 && $i <= 30) {
            $type = 'electric';
            $status = 'free';
            $electricFreeCount++;
        } elseif ($i <= 30) {
            $type = 'basic';
            $status = 'free';
        } elseif ($electricPremiumCount < 5) {
            $type = 'electric';
            $status = 'premium';
            $electricPremiumCount++;
        } else {
            $type = 'basic';
            $status = 'premium';
        }

        $stmt->execute([
            ':place_number' => $i,
            ':type' => $type,
            ':status' => $status
        ]);
    }

    echo "$numberOfSpaces parking spaces created successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>