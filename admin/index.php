<?php
    include '../controllers/db.php';
    error_reporting(0);
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
    <div class="auth_admin">
        <!----------------ФОРМА АВТОРИЗАЦИИ---------------->
        <div class="auth_form_admin">
            <p class="auth_text">Администратор</p>
            <form action="controllers/auth.php" method="POST">
                <input type="text" name="name" placeholder="Имя" class="mail_pass">
                <input type="password" name="pass" placeholder="Пароль" class="mail_pass">
                <?php 
            echo "$_SESSION[mess_error]";
            unset($_SESSION['mess_error']);
                ?>
                <input type="submit" name="auth" value="Войти" class="auth_but_admin">
            </form>
        </div>
    </div>
</body>

</html>