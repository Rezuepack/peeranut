<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAGAS X</title>
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

            <!-- โฆษณา -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- ป้ายโฆษณา -->
                        <?php include('includes/ads.php'); ?>
                        <!-- ป้ายโฆษณา -->
                    </div>

                    <div class="col-lg-12 mt-3">
                        <h2>สินค้ามาใหม่</h2>
                        <a href="#" class="view-all"><i class="fas fa-eye"></i>&nbsp;&nbsp;ดูทั้งหมด</a>
                        <hr>
                        <!-- รายการสินค้า -->
                        <?php include('includes/product.php'); ?>
                         <!-- รายการสินค้า -->
                    </div>

                </div>
            </div>

        </div>
    </div>

    <hr>


<?php include('includes/js.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>