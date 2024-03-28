<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Бронирование</title>
<style>
  /* Простые стили для примера */
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<h2>Бронирование</h2>

<form action="bron.php" method="post">
  <div>
    <label for="login">Логин:</label>
    <input type="text" id="login" name="login" required>
  </div>
  <div>
    <label for="phone">Телефон:</label>
    <input type="text" id="phone" name="phone" required>
  </div>
  <div>
  <button type="submit">Забронировать</button>
  </div>
</form>

</body>
</html>

<?php 
require_once('connect.php');
$login = $_POST['login'];
$phone = $_POST['phone'];
    $sql = "INSERT INTO bron (login, phone) VALUES ('$login', '$phone')";
    if ($db -> query($sql) === TRUE) {
        echo "Заявка отправлена";
    } else {
        echo "Ошибка: " . $db->error;}
?>