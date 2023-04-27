<?php
    include 'db.php';

    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $l_name=$_POST['l_name'];
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    $repass=$_POST['repass'];
    $mail=$_POST['mail'];
    $birthday=$_POST['birthday'];


    $add_user_str="INSERT INTO `users`(`name`, `surname`, `l_name`, `phone_number`, `password`, `mail`, `avatar`, `bitrhday`) VALUES ('$name','$surname','$l_name','$phone','$pass','$mail','../assets/img/user.png','$birthday')";

    if ($name && $surname && $l_name && $phone && $mail && $birthday) {
        if ($pass==$repass) {
            $run_add_user=mysqli_query($connect, $add_user_str);
            if ($run_add_user) {
                $_SESSION['user'] = array (
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'surname' => $user['surname'],
                    'l_name' => $user['l_name'],
                    'phone_number' => $user['phone_number'],
                    'mail' => $user['mail'],
                    'bitrhday' => $user['bitrhday'],
                    'avatar' => $user['avatar']
                    );
                header("Location:/controllers/exit.php");
            }
            else {
                $_SESSION['mess_error']="Ошибка входа";
                header("Location:/registration.php");
            }
        }
        else {
             $_SESSION['mess_error']="Пароли нет совпадают";
            header("Location:/registration.php");
        }
    }
    else {
        $_SESSION['mess_error']="Заполните все поля";
        header("Location:/registration.php");
    }
?>