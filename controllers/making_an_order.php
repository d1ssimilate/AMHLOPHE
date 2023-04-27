<?php
    include 'db.php';

    $city=$_POST['city'];
    $street=$_POST['street'];
    $house=$_POST['house'];
    $flat=$_POST['flat'];

    $id_user = $_SESSION['user']['id'];

    $out_users_str="SELECT * FROM `users` WHERE `id` = $id_user";
    $run_out_users=mysqli_query($connect, $out_users_str);

    $id_order = $_SESSION['order']['id'];

    $out_prod_str="SELECT * FROM `users` WHERE `id` = $id_order";
    $run_out_prod=mysqli_query($connect, $out_prod_str);

    $add_order_str="INSERT INTO `orders`(`id_prod`, `id_user`, `city`, `street`, `number_of_house`, `flat`, `created_at`) VALUES ('$id_order','$id_user','$city','$street','$house','$flat',CURRENT_TIMESTAMP)";

    if ($city && $street && $house && $flat) {
        $run_add_order=mysqli_query($connect, $add_order_str);
        if ($run_add_order) {
            header("Location:../user_orders.php");
        }
        else {
            $_SESSION['mess_error']="Ошибка создания заказа";
            header("Location:/making_an_order.php");
        }
    }
    else {
        $_SESSION['mess_error']="Заполните все поля";
            header("Location:/making_an_order.php");
    }
?>