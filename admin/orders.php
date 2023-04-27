<?php
    include '../controllers/db.php';

    error_reporting(0);

    $del_id=$_GET['del_id'];
    
    $str_del_prod="DELETE FROM `orders` WHERE `id` = $del_id";

    if (!$_SESSION['admin']) {
        header("Location:index.php");
    }

    if ($del_id) {
         $run_del_prod=mysqli_query($connect, $str_del_prod);
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
                <a href="users.php">Пользователи</a>
                <a href="products.php">Товары</a>
                <a href="">Заказы</a>
                <a href="..//index.php">Выйти</a>
            </div>
        </header>
        <p class="users">Заказы</p>
        <div class="table_user">
            <table width="1100px" align="center">
                <tr>
                    <th>ID
                    <th>ID/т
                    <th>ID/п
                    <th>Город
                    <th>Улица
                    <th>Дом
                    <th>Квартира
                    <th>Дата заказа
                    <th>Статус
                    <th colspan="3">Действие
                </tr>
                <?php
                $out_order_str="SELECT * FROM `orders`";
                $run_out_order=mysqli_query($connect , $out_order_str);
                while ($out_order=mysqli_fetch_array($run_out_order)) {
                    echo "
                    <tr>
                    <td>$out_order[id]
                    <td>$out_order[id_prod]
                    <td>$out_order[id_user]
                    <td>$out_order[city]
                    <td>$out_order[street]
                    <td>$out_order[number_of_house]
                    <td>$out_order[flat]
                    <td>$out_order[created_at]
                    <td>$out_order[status]
                    <td><a href=controllers/status_order.php?on_the_way_id=$out_order[id]>В пути</a>
                <td><a href=controllers/status_order.php?delivered_id=$out_order[id]>Доставлен</a>
                <td><a href='?del_id=$out_order[id]' class=delete>Удалить</a>
                    </tr>";
                    }
                    ?>
            </table>
        </div>
    </div>
</body>

</html>