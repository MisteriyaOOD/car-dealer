<?php
include('db.php'); // Включваме връзката с базата данни

// SQL заявка за извличане на всички коли от таблицата
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <title>Коли за продажба</title>
</head>

<body>
    <h1>Добре дошли в сайта за коли!</h1>

    <h2>Налични автомобили:</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Марка</th>
                <th>Модел</th>
                <th>Година</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Извеждаме данните от резултата
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["make"] . "</td>
                            <td>" . $row["model"] . "</td>
                            <td>" . $row["year"] . "</td>
                            <td>" . $row["price"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Няма налични коли.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Добави нова кола</h2>
    <form action="add_car.php" method="post">
        Марка: <input type="text" name="make"><br>
        Модел: <input type="text" name="model"><br>
        Година: <input type="number" name="year"><br>
        Цена: <input type="text" name="price"><br>
        <input type="submit" value="Добави">
    </form>
    <style>
        /* Основни стилове за тялото */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            margin: 0;
            padding: 20px;
            color: #333;
        }

        /* Стилове за заглавие */
        h1 {
            text-align: center;
            color: #fff;
        }

        /* Стил за контейнера */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        /* Таблица */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background: #007bff;
            color: #fff;
        }

        /* Форма за добавяне на кола */
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background: #28a745;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #218838;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
    </style>

</body>

</html>

<?php
// Затваряне на връзката с базата данни
$conn->close();
?>