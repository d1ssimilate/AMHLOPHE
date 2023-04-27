<?php
    include 'controllers/db.php';
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMHLOPHE</title>
    <link rel="stylesheet" href="../сss/reg.css">
</head>
<body>
    <div class="auth">
        <!----------------ФОРМА РЕГИСТРАЦИИ---------------->
        <div class="auth_form">
            <p class="auth_text">Регистрация</p>
                <?php 
                    echo "$_SESSION[mess_error]";
                    unset($_SESSION['mess_error']);
                ?>
            <div class="form_text">
            <form action="controllers/registration.php" method="POST">
                <input type="text" name="name" placeholder="Имя" class="text">
                <input type="text" name="surname" placeholder="Фамилия" class="text">
                <input type="text" name="l_name" placeholder="Отчество" class="text">
                <input type="number" name="phone" placeholder="Номер телефона" class="text">
                <input type="password" name="pass" placeholder="Пароль" class="text">
                <input type="password" name="repass" placeholder="Повторите пароль" class="text">
                <input type="email" name="mail" placeholder="Почта" class="text">
                <input type="date" name="birthday" placeholder="Дата рождения" class="text">
                <input type="submit" name="auth" value="Зарегистрироваться" class="auth_but">
            </form>
            </div>
        </div>
    </div>
</body>
</html>