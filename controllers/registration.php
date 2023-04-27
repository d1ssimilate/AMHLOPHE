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


    $add_user_str="INSERT INTO `users`(`name`, `surname`, `l_name`, `phone_number`, `password`, `mail`, `avatar`, `bitrhday`) VALUES ('$name','$surname','$l_name','$phone','$pass','$mail','dfgfdgfdg','$birthday')";

    if ($name && $surname && $l_name && $phone && $mail && $birthday) {
        if ($pass==$repass) {
            $run_add_user=mysqli_query($connect, $add_user_str);
            if ($run_add_user) {
                $_SESSION['user']=array (
                'id' => $out_user['id'],
                'mail' => $out_user['mail'],
                );
                $_SESSION['mail']=$mail ;
                $_SESSION['name']=$name ;
                $_SESSION['surname']=$surname ;
                $_SESSION['l_name']=$l_name ;
                $_SESSION['mail']=$mail ;
                $_SESSION['phone']=$phone ;
                $_SESSION['birthday']=$birthday ;
                header("Location:/profile.php");
            }
            else {
                $_SESSION['mess_error']="Ошибка входа";
                header("Location:/index.php");
            }
        }
        else {
             $_SESSION['mess_error']="Пароли нет совпдают";
            header("Location:/registration.php");
        }
    }
    else {
        $_SESSION['mess_error']="Заполните все поля";
        header("Location:/registration.php");
    }
?>