<?php
$servername = "localhost";
$username = "root"; // ако използваш XAMPP, потребителят по подразбиране е 'root'
$password = "1234"; // няма парола по подразбиране за XAMPP
$dbname = "car_dealer";

// Създаване на връзка
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка за грешка при връзка
if ($conn->connect_error) {
  die("Грешка при свързване: " . $conn->connect_error);
}
?>
