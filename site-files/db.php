<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'maniurastudio';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die('Błąd połączenia: ' . mysqli_connect_error());
}
?>