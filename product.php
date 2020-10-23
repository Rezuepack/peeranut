<?php 
    include('config/db.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้า | VAGAS X</title>
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

            

            <?php 
                if(isset($_GET['type'])) {
                    $type_name = $_GET['type'];

                    $type_sql = "SELECT * FROM `store` WHERE `store_type` = '$type_name'";
                    $store_sql = "SELECT * FROM `store`";
                    $store_query = mysqli_query($conn, $store_sql);
                    $type_query = mysqli_query($conn, $type_sql);
                    ?>
                    <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <h3 class="text-center"><i class="fas fa-shopping-cart"></i> สินค้า <?= $type_name; ?></h3>
                        <hr>
                    <?php 
                    
                    
                    while($type_row = mysqli_fetch_array($type_query)) {
                        $store_type = $type_row['store_type'];
                        
                        
                
            ?>

            
                        <?php 
                            while($store_row = mysqli_fetch_array($store_query)) {
                                $image = $store_row['store_image'];
                                $name = $store_row['store_name'];
                                $price = $store_row['store_price'];
                                
                        ?>
                        <div class="media">
                            <img src="images/store/<?= $image; ?>" width="300">
                            <div class="media-body">
                                <h5 class="mt-5">ชื่อสินค้า : <?= mb_substr($name, 0, 40, "UTF8"); ?></h5>
                                <h5>แบรนด์สินค้า : <?= mb_substr($store_type, 0, 40, "UTF8"); ?></h5>
                                <br>
                                <h5>ราคาสินค้า : <a style="color: #06a3fd;"><?= number_format($price, 2); ?></a> บาท</h5>
                                <br><br><br>
                                <div class="text-right">
                                    <a href="" class="btn btn-custom"><i class="fas fa-cart-plus"></i> หยิบใส่ตระกร้าสินค้า</a>
                                </div class="text-right">
                            </div>
                            
                        </div>
                        
                        <hr>
                        <?php } ?>


                    </div>
                </div>
            </div>

            <?php
            
        }
            } else {
            ?>

            <!-- แสดงสินค้า -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <h3 class="text-center"><i class="fas fa-shopping-cart"></i> สินค้าทั้งหมด</h3>
                        <hr>
                        <?php 
                            $product_sql = "SELECT * FROM `store`";
                            $product_query = mysqli_query($conn, $product_sql);
                            while($product_row = mysqli_fetch_array($product_query)) {
                                $name = $product_row['store_name'];
                                $image = $product_row['store_image'];
                                $type = $product_row['store_type'];
                                $price = $product_row['store_price'];
                                
                        ?>
                        <!-- <form action="" method="">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-custom" name="search"><i class="fas fa-search"></i> ค้นหา</button>
                                </div>
                                <input type="text" name="form_search" class="form-control" placeholder="ค้นหารายการสินค้า">
                            </div>
                        </form> -->
                        
                        <div class="media">
                            <img src="images/store/<?= $image; ?>" width="300">
                            <div class="media-body">
                                <h5 class="mt-5">ชื่อสินค้า : <?= mb_substr($name, 0, 40, "UTF8"); ?></h5>
                                <h5>แบรนด์สินค้า : <?= mb_substr($type, 0, 40, "UTF8"); ?></h5>
                                <br>
                                <h5>ราคาสินค้า : <a style="color: #06a3fd;"><?= number_format($price, 2); ?></a> บาท</h5>
                                <br><br><br>
                                <div class="text-right">
                                    <a href="" class="btn btn-custom"><i class="fas fa-cart-plus"></i> หยิบใส่ตระกร้าสินค้า</a>
                                </div class="text-right">
                            </div>

                            
                        </div>
                        <hr>
                        <?php } ?>
                    </div>

                    <div class="col-lg-12">
                        <hr>
                    </div>

                </div>
            </div>

            <?php } ?>

        </div>
    </div>

    <?php include('includes/js.php'); ?>
</body>
</html>