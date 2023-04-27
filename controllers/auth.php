<?php
    include 'db.php';
    
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];

    $out_user_str="SELECT * FROM `users` WHERE mail ='$mail' AND password ='$pass'";
    $run_out_user=mysqli_query($connect, $out_user_str);
    $count_user=mysqli_num_rows($run_out_user);
    if ($mail && $pass) {
        if ($count_user==1) {
            $_SESSION['user']=array (
                'id' => $out_user['id'],
                'mail' => $out_user['mail'],
                );
                header("Location:/index.php");
        }
        else {
            $_SESSION['mess_error']="Учетные данные не верны!";
            header("Location:/auth.php");
        }
        
    }
    
    else {
        $_SESSION['mess_error']="Заполните все поля";
            header("Location:/auth.php");
    }
    
?>
?>