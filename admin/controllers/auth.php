<?php
    include '../../controllers/db.php';
    
    $name=$_POST['name'];
    $pass=$_POST['pass'];

    $out_user_str="SELECT * FROM `users` WHERE `name` ='admin' AND password ='admin'";
    $run_out_user=mysqli_query($connect, $out_user_str);
    $count_user=mysqli_num_rows($run_out_user);
    if ($name && $pass) {
        if ($count_user==1) {
            $_SESSION['admin']=array (
                'id' => $out_user['id'],
                'name' => $out_user['name'],
                );
                header("Location:/admin/products.php");
        }
        else {
            $_SESSION['mess_error']="Учетные данные не верны!";
            header("Location:/admin/index.php");
        }
        
    }
    
    else {
        $_SESSION['mess_error']="Заполните все поля";
            header("Location:/admin/index.php");
    }
    
?>
?>