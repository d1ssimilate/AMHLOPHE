<?php
    include '../../controllers/db.php';

    $name_prod=$_POST['name_prod'];
    $cat_id=$_POST['cat_id'];
    $description=$_POST['description'];
    $code=$_POST['code'];
    $country_prod=$_POST['country_prod'];
    $color_prod=$_POST['color_prod'];
    $warranty=$_POST['warranty'];
    $price=$_POST['price'];
    $width=$_POST['width'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $img=$_FILES['img'];
    
    $path = 'uploads/' . time() .$_FILES['img']['name'];

    $add_prod_str="INSERT INTO `products`(`name_prod`, `cat_id`, `description`, `code`, `country_prod`, `color`, `warranty`, `price`, `width`, `height`, `weight`, `img`) VALUES ('$name_prod','$cat_id','$description','$code','$country_prod','$color_prod','$warranty','$price','$width','$height','$weight','$path')";

    if ($name_prod && $cat_id && $description && $code && $country_prod && $color_prod && $warranty && $price && $width && $height && $weight && $img) {

        if (!move_uploaded_file($_FILES['img']['tmp_name'] ,'../../'. $path)) {
            $_SESSION['mess_error']="Ошибка добавления изображения";
            header("Location:/admin/products.php");
        }
        $run_add_prod=mysqli_query($connect, $add_prod_str);
        if ($run_add_prod) {
            $_SESSION['mess']="Товар добавлен";
            header("Location:/admin/products.php");
        }
        else {
            $_SESSION['mess_error']="Ошибка добавления";
            header("Location:/admin/products.php");
        }
    }
    else {
        $_SESSION['mess']="Заполните все поля";
        header("Location:/admin/products.php");
    }
?>