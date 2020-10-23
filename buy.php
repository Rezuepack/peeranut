<?php 
    session_start();
    error_reporting(0);
    if(empty($_SESSION['client'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href = "login.php";</script>';
    }
    if(empty($_SESSION['shopping_cart'])) {
        echo '<script>alert("กรุณาเลือกสินค้าก่อน");window.location.href = "login.php";</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันการสั่งซื้อสินค้า | VAGAS X</title>
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

            <!--  -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <form action="bill/confirm.php" method="POST">
                            <table class="table text-center">
                                <thead class="table-custom">
                                    <tr>
                                        <th>สินค้า</th>
                                        <th>ราคา</th>
                                        <th>จำนวน</th>
                                        <th>รวม / รายการ</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $total = 0;
                                    foreach($_SESSION['shopping_cart'] as $store_id => $store_qty) {
                                        $sql = "SELECT * FROM `store` WHERE `store_id` = '$store_id'";
                                        $query = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($query);
                                        $sum = $row['store_price'] * $store_qty;
                                        $total += $sum;
                                    
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?= $row['store_name']; ?></td>
                                        <td><?= number_format($row['store_price'], 2); ?></td>
                                        <td><?= $store_qty; ?></td>
                                        <td><?= number_format($sum, 2); ?></td>
                                    </tr>
                                </tbody>
                                <?php 
                                    }
                                ?>
                                <thead class="table-custom">
                                    <tr>
                                        <th></th>
                                        <th>รวมราคาสุทธิ</th>
                                        <th><?= number_format($total, 2); ?></th>
                                        <th>บาท</th>
                                    </tr>
                                </thead>
                            </table>
                        
                    </div>

                    <div class="col-lg-12">
                            <input type="hidden" name="store_id" value="<?= $row['store_id']; ?>">
                            <input type="hidden" name="name" value="<?= $row['store_name']; ?>">
                            <input type="hidden" name="client" value="<?= $_SESSION['client_id']; ?>">
                            <div class="text-right">
                                <button type="submit" name="buy" class="btn btn-custom">สั่งซื้อสินค้า</button>
                            </div>
                        <hr>
                    </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <?php include('includes/js.php'); ?>
</body>
</html>