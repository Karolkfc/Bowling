<?php 
// Подключаем коннект к БД
require_once 'connect.php';
 
// Проверяем нажата ли кнопка отправки формы
if (isset($_REQUEST['doGo'])) {
    
    // Все последующие проверки, проверяют форму и выводят ошибку
    // Проверка на совпадение паролей
    if ($_REQUEST['pass'] !== $_REQUEST['pass_rep']) {
        $error = 'Пароль не совпадает';
    }
    
    // Проверка есть ли вообще повторный пароль
    if (!$_REQUEST['pass_rep']) {
        $error = 'Введите повторный пароль';
    }
    
    // Проверка есть ли пароль
    if (!$_REQUEST['pass']) {
        $error = 'Введите пароль';
    }
 
    // Проверка есть ли email
    if (!$_REQUEST['email']) {
        $error = 'Введите email';
    }
 
    // Проверка есть ли логин
    if (!$_REQUEST['login']) {
        $error = 'Введите login';
    }
 
    // Если ошибок нет, то происходит регистрация 
    if (!$error) {
        $login = $_REQUEST['login'];
        $email = $_REQUEST['email'];
        // Пароль хешируется
        $pass = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT);
        // Если день рождения не был указан, то будет самый последний год из доступных
        $DOB = $_REQUEST['year_of_birth'];
        
        // Добавление пользователя
        mysqli_query($db, "INSERT INTO `users` (`login`, `email`, `password`, `DOB`) VALUES ('" . $login . "','" . $email . "','" . $pass . "', '" . $DOB . "')");
        
        // Подтверждение что всё хорошо
        echo 'Регистрация прошла успешна';
    } else {
        // Если ошибка есть, то выводить её 
        echo $error; 
    }
}
 
?>
 
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Зарегистрироваться</title>
</head>
<body>
    <form>
        <label for="username">Login:</label>
        <input class="form-cont" type="text" id="login" name="login"><br><br>
        <label for="email">email:</label>
        <input class="form-cont" type="text" id="email" name="email"><br><br>
        <label for="phone">phone:</label>
        <input class="form-cont" type="text" id="phone" name="phone"><br><br>
        <label for="password">password:</label>
        <input class="form-cont" type="text" id="password" name="password"><br><br>
        <input for="submit" name="doGo" value="Registration">
    </form>
</body>
</html>