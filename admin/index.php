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
            <form action="" method="POST">
                <p>Добавление товара</p>
                <input type="text" placeholder="Название товара" name="name_prod"><br>
                <select name="category">
                    <option>Сплит системы</option>
                    <option>Мобильные кондиционеры</option>
                    <option>Оконные кондиционеры</option>
                    <option>Потолочные кондиционеры</option>
                    <option>Промышленные кондиционеры</option>
                    <option>Канальные кондиционеры</option>
                    <option>Колонные кондиционеры</option>
                </select><br>
                <textarea name="description" placeholder="Описание"></textarea><br>
                <input type="text" placeholder="Артикул" name="code"><br>
                <input type="text" placeholder="Страна производства" name="country_prod"><br>
                <input type="text" placeholder="Цвет" name="color_prod"><br>
                <input type="text" placeholder="Гарантия" name="warranty"><br>
                <input type="text" placeholder="Цена" name="price"><br>
                <input type="file" name="img"><br>
                <input type="submit" name="add_product" value="Добавить товар"><br>
            </form>
        </div>
        <div class="table">
            <table width="1100px" align="center">
                <tr>
                    <th>№ п/п
                    <th>Название товара
                    <th>Категория товара
                    <th>Артикул
                    <th>Страна
                    <th>Цвет
                    <th>Гарантия
                    <th>Цена
                    <th>Изображение
                    <th colspan=3>Действие
                </tr>
            </table>
        </div>
    </div>
</body>
</html>