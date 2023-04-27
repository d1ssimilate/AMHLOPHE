<?php
    include '../controllers/db.php';
    error_reporting(0);

    $del_id=$_GET['del_id'];
    $str_del_user="DELETE FROM `users` WHERE `id` = $del_id";

    if (!$_SESSION['admin']) {
        header("Location:index.php");
    }

    if ($del_id) {
         $run_del_user=mysqli_query($connect, $str_del_user);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../сss/index.css">
</head>

<body>
    <div class="wrapper_admin">
        <header>
            <p>АДМИН ПАНЕЛЬ</p>
            <div class="admin_links">
                <a href="">Пользователи</a>
                <a href="products.php">Товары</a>
                <a href="orders.php">Заказы</a>
                <a href="..//index.php">Выйти</a>
            </div>
        </header>
        <p class="users">Пользователи</p>
        <div class="table_user">
            <table width="1100px" align="center">
                <tr>
                    <th>ID
                    <th>Имя
                    <th>Фамилия
                    <th>Отчество
                    <th>Номер телефона
                    <th>Почта
                    <th>Дата рождения
                    <th>Действие
                </tr>
                <?php
                $out_users_str="SELECT * FROM `users`";
                $run_out_users=mysqli_query($connect, $out_users_str);
                while ($out_users=mysqli_fetch_array($run_out_users)) {
                    echo "
                    <td>$out_users[id]
                    <td>$out_users[name]
                    <td>$out_users[surname] 
                    <td>$out_users[l_name]
                    <td>$out_users[phone_number]
                    <td>$out_users[mail]
                    <td>$out_users[bitrhday]
                    <td><a href='?del_id=$out_users[id]'>Удалить</a>
                </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>