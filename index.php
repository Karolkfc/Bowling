<?php 
// Подключение БД
require_once 'connect.php';
 
// Проверка нажата ли кнопка отправки формы
if (isset($_REQUEST['doGo'])) {
 
    // Последующий код проверяет вообще есть формы
    // Проверяет логин
    if (!$_REQUEST['login']) {
        $error = 'Введите логин';
    }
    // Проверяет пароль
    if (!$_REQUEST['pass']) {
        $error = 'Введите пароль';
    }
 
    // Проверяет ошибки
    if (!$error) {
        $login = $_REQUEST['login'];
        $pass = $_REQUEST['pass'];
 
        // берёт из БД пароль и id пользователя 
        if ($result = mysqli_query($db, "SELECT `password`, `id` FROM `users` WHERE `login`='" . $login . "'")) {
            while( $row = mysqli_fetch_assoc($result) ){ 
                // Проверяет есть ли id
                if ($row['id']) {
                    // если id есть, то он сравнивает пароли функцией password_verify
                    if (password_verify($pass, $row['password'])) {
                        // Если функция возвращает true, то вы входите
                        echo "Вы вошли";
                        // скрипт больше не выполняется
                        exit;
                    } else {
                         // Если функция возвращает false, то выводит ошибку
                         echo "Пароль не совпадает";
                    }
                } else {
                    // Выводит ошибку если не нашли такой логин
                    echo "Ввели не верны логин";
                }
            } 
        }
    } else {
         // Выводит ошибки, если есть пустые поля формы
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
    <title>Войти</title>
</head>
<body>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>">
        <p>Логин: <input type="text" name="login" id=""></p>
        <p>Пароль: <input type="password" name="pass" id="">
        <p><input type="submit" value="Войти" name="doGo"></p>
    </form>
</body>
</html>