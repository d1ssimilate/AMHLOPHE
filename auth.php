<?php
    error_reporting(0);
    include 'controllers/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMHLOPHE</title>
    <link rel="stylesheet" href="../сss/auth.css">
</head>
<body>
    <div class="auth">
        <!----------------ФОРМА АВТОРИЗАЦИИ---------------->
        <div class="auth_form">
            <p class="auth_text">Авторизация</p>
            <form action="controllers/auth.php" method="POST">
                <input type="text" name="mail" placeholder="Почта" class="mail_pass">
                <input type="password" name="pass" placeholder="Пароль" class="mail_pass">
        <?php 
            echo "$_SESSION[mess_error]";
            unset($_SESSION['mess_error']);
                ?>
                <input type="submit" name="auth" value="Войти" class="auth_but"> 
                <p class="create_acc">Нет аккаунта? <a href="registration.php">Создайте его</a></p>
            </form>
        </div>
    </div>
</body>
</html>