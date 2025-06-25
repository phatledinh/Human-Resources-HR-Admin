<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "system_employees";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>


<!-- PHP Intelephense
PHP Server
PHP DocBlocker
PHP Debug
PHP IntelliSense
C:\xampp\php
"php.validate.executablePath": "C:/xampp/php/php.exe", -->