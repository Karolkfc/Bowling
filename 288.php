<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Зарегистрироваться</title>
</head>
<body>
    <form action = "288.php" method="POST">
        <label for="username">Login:</label>
        <input class="form-cont" type="text" id="login" name="login"><br><br>
        <label for="email">email:</label>
        <input class="form-cont" type="text" id="email" name="email"><br><br>
        <label for="phone">phone:</label>
        <input class="form-cont" type="text" id="phone" name="phone"><br><br>
        <label for="password">password:</label>
        <input class="form-cont" type="password" id="password" name="password"><br><br>
        <label for="password">потворный password:</label>
        <input class="form-cont" type="password" name="repeatpassword"><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>

<?php
require_once ('connect.php');
$login = $_POST['login'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$repeatpassword = $_POST['repeatpassword'];
if ($password != $repeatpassword) {
    echo "Пароли не совпадают";
} else {
    $passw=password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (login, email, phone, password) VALUES ('$login', '$email', '$phone', '$password')";
    if ($db -> query($sql) === TRUE) {
        echo "Успешная регистрация";
    }
    else {
        echo "Ошибка: " . $db->error;
    }

}
?>