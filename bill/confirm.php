<?php 
    session_start();
    include_once('../config/db.php');

    $id = $_REQUEST['store_id'];
    $client_id = $_REQUEST['client'];
    $name = $_REQUEST["name"];
    $dttm = Date("Y-m-d G:i:s");
    
    foreach($_SESSION['shopping_cart'] as $store_id => $store_qty) {
        $stores_sql = "SELECT * FROM `store` WHERE `store_id` = '$store_id'";
        $stores_query = mysqli_query($conn, $stores_sql);
        $stores_row = mysqli_fetch_array($stores_query);
        $total = $stores_row['store_price'] * $store_qty;

        $sale_sql = "INSERT INTO `sales` (client_id, store_code, sale_date) VALUES ('$client_id', '$store_id', '$dttm')";
        $sql_query = mysqli_query($conn, $sale_sql);

        $insurance_sql = "INSERT INTO `insurance` (store_id, insurance_date) VALUES ('$store_id', '$dttm')";
        $insurance_query = mysqli_query($conn, $insurance_sql);

        $bills_sql = "INSERT INTO `bills` (cilent_id, store_name) VALUES ('$client_id', '$name')";
        $bills_query = mysqli_query($conn, $bills_sql);

        $formating_sql = "INSERT INTO `formation` (store_id) VALUES ('$store_id')";
        $formating_query = mysqli_query($conn, $formating_sql);

    }

    if($sql_query && $insurance_query && $bills_query && $formating_query) {
        header("Location: ../follow.php");
    }

?>