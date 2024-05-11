<?php
// Database credentials
$host = '127.0.0.1';  // Database host
$dbname = 'mydb';  // Database name
$user = 'root';  // Database username
$pass = '';  // Database password
$charset = 'utf8mb4';  // Character set

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  
    PDO::ATTR_EMULATE_PREPARES => false,  
];

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Handle any errors
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
