<?php 
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
                    <div class="col-lg-12">
                        <h3 class="text-center">แสดงความคิดเห็น</h3>
                        <hr>
                        <!-- เมนูแสดงความคิดเห็น -->
                        <?php include('includes/comment.php'); ?>
                        <!-- เมนูแสดงความคิดเห็น -->
                    </div>
                </div>
            </div>

            <!-- เข้าสู่ระบบ -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <h3 class="text-center"><i class="fas fa-shopping-cart"></i> สินค้าทั้งหมด</h3>
                        <!-- <form action="" method="">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-custom" name="search"><i class="fas fa-search"></i> ค้นหา</button>
                                </div>
                                <input type="text" name="form_search" class="form-control" placeholder="ค้นหารายการสินค้า">
                            </div>
                        </form> -->
                        <div class="col-lg-3">

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <hr>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php include('includes/js.php'); ?>
</body>
</html>