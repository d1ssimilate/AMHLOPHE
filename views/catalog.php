<div class="bg">
    <?php
    $pdo  = new Model();
    
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
    } else {
        $category = 1;
    }
    ?>
    <div class="category">
        <div class=category_top>
            <?php
        $menu = $pdo->GetAll('SELECT * FROM menu_items');
        foreach ($menu as $item) {
            echo " 
            <a href=$item[link]>$item[name]</a>
        ";
        }
        ?>
        </div>
        <span>Категории</span>
        <div class="category_top">
            <?php
        $categories = $pdo->GetAll('SELECT * FROM categories');
        foreach ($categories as $item) {
        echo " 
        <a href=?category=$item[id_cat]>$item[name_cat]</a>
            ";
            }
        ?>
        </div>
    </div>
    <div class="spit_system_contain">
        <div class="category_name_contain">
            <p class="category_name">
                <?php
                switch ($category) {
                    case 1:
                        $categoryLabel = "Сплит системы";
                        break;
                    case 2:
                        $categoryLabel = "Мобильные кондиционеры";
                        break;
                    case 3:
                        $categoryLabel = "Потолочные кондиционеры";
                        break;
                    case 4:
                        $categoryLabel = "Оконные кондиционеры";
                        break;
                    case 5:
                        $categoryLabel = "Промышленные кондиционеры";
                        break;
                    case 6:
                        $categoryLabel = "Канальные кондиционеры";
                        break;
                    case 7:
                        $categoryLabel = "Колонные кондиционеры";
                        break;
                    default:
                        $categoryLabel = "Другая категория";
                        break;
                }

                echo $categoryLabel;
                ?>
            </p>
            <div class="filtering">
                <form method="POST">
                    <input type="submit" name="up" value="Цена &#8593;">
                    <input type="submit" name="down" value="Цена &#8595;">
                    <input type="submit" name="reset" value="Сбросить">
                </form>

            </div>
        </div>
        <div class="category_product">
            <pre>
            <?php
             $products = $pdo->GetAll("SELECT * FROM products WHERE `cat_id` = '$category'");
             foreach ($products as $card) {
                echo "
                <div class=product_card_contain>
                    <div class=product_card_inf>
                        <div class=img_product>
                        <img src=../$card[img] alt=>
                        </div>
                        <div class=product_inf>
                            <div class=product_namePrice>
                                <a class=product_nameProd href=>$card[name_prod]</a>
                                <p>$card[price] ₽</p>
                            </div>
                            <div class=product_butttons>
                                <div class=product_buy>
                                <a href=../order.php?product_id=$card[id]>Купить</a>
                            </div>
                            <div class=product_about>
                            <a href=../about_product.php?about_product_id=$card[id]>Подробнее</a>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
             }
            ?>
            </pre>


        </div>
    </div>
</div>