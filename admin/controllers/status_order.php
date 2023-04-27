<?php

    include '../../controllers/db.php';

    $on_the_way_id=$_GET['on_the_way_id'];
    $delivered_id=$_GET['delivered_id'];

    if ($delivered_id) {
        $upd_status_str="UPDATE `orders` SET `status`='Доставлен' WHERE `id` = $delivered_id";
        $run_upd_status=mysqli_query($connect  , $upd_status_str);
        if ($run_upd_status) {
            header("Location:/admin/orders.php");
        }
    }

    if ($on_the_way_id) {
        $upd_status_str="UPDATE `orders` SET `status`='В пути' WHERE `id` = $on_the_way_id";
        $run_upd_status=mysqli_query($connect  , $upd_status_str);
        if ($run_upd_status) {
            header("Location:/admin/orders.php");
        }
    }
?>