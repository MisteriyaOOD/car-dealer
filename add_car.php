<?php
include('db.php'); // Включваме връзката с базата данни

// Проверка дали формата е изпратена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    // SQL заявка за добавяне на нова кола
    $sql = "INSERT INTO cars (make, model, year, price) VALUES ('$make', '$model', '$year', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Нова кола беше добавена успешно!";
    } else {
        echo "Грешка: " . $sql . "<br>" . $conn->error;
    }

    // Пренасочване обратно към главната страница
    header("Location: index.php");
    exit();
}

$conn->close();
?>
