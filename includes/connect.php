<?php
$dsn = "mysql:host=localhost;dbname=portfolio;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ]);
} catch (PDOException $e) {
    error_log($e->getMessage());
    exit('Unable to connect to database');
}
?>
