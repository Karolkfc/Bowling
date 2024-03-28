<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'koulen', sans-serif;
            background: linear-gradient(to right, #22A898, #B45723);
            margin: 0;
            padding: 0;
        }

        header {
            background: linear-gradient(to right, #22A898, #B45723);
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header a {
            color: #fff;
            text-decoration: none;
        }

        .logo {
            cursor: pointer;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .login-container {
            border: 10px solid #D78D37;
            background: linear-gradient(to right, #22A898, #B45723);
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: 'Post No Bills Colombo ExtraBold';
            color: white;
            font-weight: bold;
            width: 80%;
            max-width: 400px; /* Добавлено для адаптивности */
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            font-family: 'Post No Bills Colombo ExtraBold';
            color: black;
            font-size: 18px;
            border-radius: 30px;
            border: none;
            font-weight: bold;
        }

        .login-container button {
            background-color: #26C7B3;
            color: #fff;
            border: none;
            padding: 20px 40px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
            width: 100%; /* Добавлено для адаптивности */
        }

        .register-link {
            margin-top: 10px;
            font-size: 18px;
        }

        footer {
            background: linear-gradient(to right, #22A898, #B45723);
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
    }

    @media (min-width: 768px) {
      .login-container {
        width: 50%;
      }
    }
    </style>
    <title>Вход</title>
</head>
<body>
    <header>
        <div class="logo"><a href="bowling.html"><img src="img/Group 1.png" alt="logo"></a></div>
    </header>

    <main>
        <div class="login-container">
            <h2>Войдите в свой аккаунт</h2>
            <form>
                <input type="login" placeholder="Логин" required><br>
                <input type="password" placeholder="Пароль" required><br>
                <button type="submit" onclick="redirectToSite()">ВОЙТИ</button>
                <script>
                    function redirectToSite() {
                        window.location.href = "kab.html"; // Замените ссылку на нужный URL
                    }
                </script>
            </form>
            <div class="register-link">
                <p>Нету аккаунта? <a href="regist.html">Зарегистрироваться</a></p>
            </div>
        </div>
    </main>

    <footer>
    </footer>
</body>
</html>

<?php
require_once('connect.php');
if (!empty($_REQUEST['login'])&& !empty($_REQUEST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE login = '$login";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $user=$result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "Добро пожаловать, ". $user['login']. "!";

        }
    else {
        echo "Нет такого пользователя";
    }
    }
}
?>