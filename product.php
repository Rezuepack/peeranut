<?php 
    include('config/db.php');
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes/css.php'); ?>

</head>
<body>

    <?php include('includes/navbar.php'); ?>

    <div class="container">
        <div class="row">
            <!-- เมนู -->
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- เมนูแถบซ้าย  -->
                        <?php include('includes/menu.php'); ?>
                        <!-- เมนูแถบซ้าย  -->
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
            
            <?php 

                if(empty($_GET['type'])) {
                    $type_sql = "SELECT * FROM `store`";
                } else {
                    $type_sql = "SELECT * FROM `store` WHERE `store_type` = '".$_GET["type"]."'";
                }

                $type_sql_query = mysqli_query($conn, $type_sql);
                while($type_row = mysqli_fetch_array($type_sql_query)) {
                    $image = $type_row['store_image'];
                    $name = $type_row['store_name'];
                    $price = $type_row['store_price'];
                    $id = $type_row['store_id'];
            ?>
                
            
                    <div class="col-lg-12 mt-2">
                        <div class="media">
                        <img src="images/store/<?= $image; ?>" width="300">
                        <div class="media-body">
                            <h5 class="mt-5">ชื่อสินค้า : <?= mb_substr($name, 0, 40, "UTF8"); ?></h5>
                            <h5>แบรนด์สินค้า : <?= mb_substr($store_type, 0, 40, "UTF8"); ?></h5>
                            <br>
                            <h5>ราคาสินค้า : <a style="color: #06a3fd;"><?= number_format($price, 2); ?></a> บาท</h5>
                            <br><br><br>
                            <div class="text-right">
                            <?= '<a href="cart.php?store_id='.$id.'&action=add" class="btn btn-custom"><i class="fas fa-cart-plus"></i> หยิบใส่ตระกร้าสินค้า</a>' ?>
                            </div class="text-right">
                            
                        </div>
                    </div>
                    <hr>
                
            <?php 
                    }
            ?>
                      </div>
            </div>           



        </div>
    </div>

    <?php include('includes/js.php'); ?>
</body>
</html>