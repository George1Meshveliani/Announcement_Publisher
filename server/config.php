<?php
$host = 'localhost';
$dbname = 'userregistration';
$user = 'root';
$password = 'Anri1992!';
$charset = 'utf8mb4';
// Set DSN
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
// PDO atributes
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create PDO instance
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    // throw new PDOException($e->getMessage(), $e->getCode());
    echo "Connection failed: " . $e->getMessage() . "<br>";
    echo $e->getCode();
}
