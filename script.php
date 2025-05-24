<?php
// Database connection
$host = 'localhost';
$dbname = 'parking_db'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Number of parking spaces to create
    $numberOfSpaces = 50; // Total spaces
    $electricFreeCount = 0; // Counter for free electric spaces
    $electricPremiumCount = 0; // Counter for premium electric spaces

    // Insert parking spaces into the database
    $stmt = $pdo->prepare("INSERT INTO parkings (place_number, type, status) VALUES (:place_number, :type, :status)");

    for ($i = 1; $i <= $numberOfSpaces; $i++) {
        // Determine type and status
        if ($i <= 10) {
            // First 10 places are handicapped and free
            $type = 'handicapped';
            $status = 'free';
        } elseif ($electricFreeCount < 5 && $i <= 30) {
            // Assign 5 free electric spaces within the first 30 free spaces
            $type = 'electric';
            $status = 'free';
            $electricFreeCount++;
        } elseif ($i <= 30) {
            // Remaining free spaces are basic
            $type = 'basic';
            $status = 'free';
        } elseif ($electricPremiumCount < 5) {
            // Assign 5 premium electric spaces within the last 20 premium spaces
            $type = 'electric';
            $status = 'premium';
            $electricPremiumCount++;
        } else {
            // Remaining premium spaces are basic
            $type = 'basic';
            $status = 'premium';
        }

        // Execute the insert query
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