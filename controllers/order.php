<?php
    include 'db.php';

    $order_id=$_GET['order_id'];

    $out_prod_str="SELECT * FROM `products` WHERE `id` = $order_id";
    $run_out_prod=mysqli_query($connect , $out_prod_str);
    if ($order_id) {
        $prod=mysqli_fetch_assoc($run_out_prod);
        $_SESSION['order'] = array (
            'id' => $prod['id'],
            'name_prod' => $prod['name_prod'],
            'img' => $prod['img'],
            'price' => $prod['price'],
        );
        header("Location:../making_an_order.php");
    }

?>