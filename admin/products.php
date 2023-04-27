<?php
    include '../controllers/db.php';
    error_reporting(0);
    $del_id=$_GET['del_id'];
    $str_del_prod="DELETE FROM `products` WHERE `id` = $del_id";

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
                <a href="">Товары</a>
                <a href="orders.php">Заказы</a>
                <a href="..//index.php">Выйти</a>
            </div>
        </header>
        <div class="products_adminka">
            <p>Товары</p>
            <form action="controllers/add_product.php" method="POST" enctype="multipart/form-data">
                <p>Добавление товара</p>
                <input type="text" placeholder="Название товара" name="name_prod" enctype="multipart/form-data"><br>
                <select name="cat_id">
                    <?php
                    $out_cat_str="SELECT * FROM `categories`";
                    $run_out_cat=mysqli_query($connect, $out_cat_str);
                    while ($out_cat=mysqli_fetch_array($run_out_cat)) {
                        echo "<option value=$out_cat[id_cat]>$out_cat[name_cat]</option>";
                    }
                   ?>
                </select><br>
                <textarea name="description" placeholder="Описание"></textarea><br>
                <input type="text" placeholder="Артикул" name="code"><br>
                <input type="text" placeholder="Страна производства" name="country_prod"><br>
                <input type="text" placeholder="Цвет" name="color_prod"><br>
                <input type="text" placeholder="Гарантия" name="warranty"><br>
                <input type="text" placeholder="Цена" name="price"><br>
                <input type="text" placeholder="Ширина" name="width"><br>
                <input type="text" placeholder="Высота" name="height"><br>
                <input type="text" placeholder="Вес" name="weight"><br>
                <input type="file" name="img"><br>
                <input type="submit" name="add_product" value="Добавить товар"><br>
            </form>
        </div>
        <?php 
                echo "$_SESSION[mess_error]";
                echo "$_SESSION[mess]";
                unset($_SESSION['mess_error']);
                ?>
        <div class="table">
            <table width="2400px" border="">
                <tr>
                    <th>№ п/п
                    <th>Название товара
                    <th>Категория товара
                    <th>Артикул
                    <th>Страна
                    <th>Цвет
                    <th>Гарантия
                    <th>Цена
                    <th>Ширина
                    <th>Высота
                    <th>Вес
                    <th>Изображение
                    <th>Действие
                </tr>
                <?php
                $out_prod_str="SELECT * FROM `products`";
                $run_out_prod=mysqli_query($connect, $out_prod_str);
                while ($out_prod=mysqli_fetch_array($run_out_prod)) {
                    echo "
                    <td>$out_prod[id]
                    <td>$out_prod[name_prod]
                    <td>$out_prod[cat_id] 
                    <td>$out_prod[code]
                    <td>$out_prod[country_prod]
                    <td>$out_prod[color]
                    <td>$out_prod[warranty] мес
                    <td>$out_prod[price] ₽
                    <td>$out_prod[width] см
                    <td>$out_prod[height] см
                    <td>$out_prod[weight] кг
                    <td><img class=admin_img src=../$out_prod[img] alt=>
                    <td><a href='?del_id=$out_prod[id]' class=delete>Удалить</a>
                </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>