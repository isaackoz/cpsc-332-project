<?php
// Database credentials
$host = '127.0.0.1';  // Database host
$dbname = 'test';  // Database name
$user = 'root';  // Database username
$pass = 'password';  // Database password
$charset = 'utf8mb4';  // Character set

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// Options for PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Make the default fetch be an associative array
    PDO::ATTR_EMULATE_PREPARES => false,  // Turn off emulation mode for "real" prepared statements
];

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Handle any errors
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
