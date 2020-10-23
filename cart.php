<?php 
    include_once('config/db.php');
    session_start();
    error_reporting(0);
    if(empty($_SESSION['client'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href="login.php"</script>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ | VAGAS X</title>
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

            <!-- เข้าสู่ระบบ -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                    
                    <?php 
                        $store_id = $_REQUEST['store_id'];
                        $action = $_REQUEST['action'];

                        if($action == 'add' && !empty($store_id)) {

                            if(!isset($_SESSION['shopping_cart'])) {
                                $_SESSION['shopping_cart'] = array();
                            } else {
                                echo '<script>window.location.href="cart.php?store_id=$store_id&action=update"</script>';
                            }

                            if(isset($_SESSION['shopping_cart'][$store_id])) {
                                $_SESSION['shopping_cart'][$store_id]++;
                            } else {
                                $_SESSION['shopping_cart'][$store_id] = 1;

                            }

                        } 

                        if($action == "remove" && !empty($store_id)) {
                            unset($_SESSION['shopping_cart'][$store_id]);
                            echo "<script>window.location.href='cart.php';</script>";
                        }
                        
                        if($action == "update") {
                            $amount_array = $_POST['amount'];
                            foreach ($amount_array as $store_id => $amount) {
                                $_SESSION['shopping_cart'][$store_id] = $amount;
                            }
                            echo "<script>window.location.href='cart.php';</script>";
                        }

                    ?>

                    

                    <form action="?action=update" method="POST">
                       
                    <?php
                    
                    

                        if(!empty($_SESSION['shopping_cart'])) {
                            foreach($_SESSION['shopping_cart'] as $store_id => $store_qty) {
                                $sql = "SELECT * FROM `store` WHERE `store_id` = '$store_id'";
                                $query = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($query)) {
                                    $id = $row['store_id'];
                                    $sum = $row['store_price'] * $store_qty;
                                    $total += $sum;
                                
                    ?>
                            <table class="table text-center">
                                <thead class="table-custom">
                                    <tr>
                                        <th>รหัสสินค้า</th>
                                        <th>รูปภาพสินค้า</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>ราคาสินค้า</th>
                                        <th>จำนวนสินค้า</th>
                                        <th>รวมราคาสินค้า</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                            <tbody>

                        <tr>
                                <td><?= $row['store_id']; ?></td>
                                <td><img src="images/store/<?= $row['store_image']; ?>" width="200"></td>
                                <td><?= mb_substr($row['store_name'], 0, 40, "UTF8"); ?></td>
                                <td><?= number_format($row['store_price'], 2); ?></td>
                                <?= "<td align='right'><input type='number' name='amount[$store_id]' value='$store_qty' style='width: 64px;'/></td></td>" ?>
                                <td><?= number_format($sum, 2); ?></td>
                                <td><?= "<a href='cart.php?store_id=$id&action=remove' class='btn btn-danger'><i class='fas fa-trash'></i></a>" ?></td>
                            
                                    
                        
                                </tr>
                    <?php
                    
                            }

                        }

                        
                            ?>

                        </tbody>
                    <thead class="table-custom">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">รวมราคาสุทธิ</th>
                                    <th scope="col"><?= number_format($total, 2) ?></th>
                                    <th scope="col">บาท</th>
                                </tr>
                            </thead>
                        
                        </table>
                        <button type="submit" name="update" class="btn btn-custom">คำนวณราคาใหม่</button>
                        <a href="product.php" class="btn btn-custom">กลับไปหน้าสินค้า</a>
                        <a href="buy.php" class="btn btn-custom" style="float: right;">สั่งซื้อ</a>
                    </form>
                            <?php 
                        
                    } else {
                        echo '<h3 class="text-center">ไม่มีสินค้าอยู่ในตะกร้าของคุณ</h3>';
                    }
                    ?>
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