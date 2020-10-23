<?php 
    session_start();
    error_reporting(0);
    if(empty($_SESSION['client'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href = "login.php";</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดตามรายการสินค้าที่สั่ง | VAGAS X</title>
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
                        
                        <table class="table text-center">
                            <thead class="table-custom">
                                <tr>
                                    <th>เลขที่สัญญาการขาย</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>วันที่ขาย</th>
                                    <th>ส่งเคลมสินค้า</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $client_id = $_SESSION['client_id'];
                                $sql = "SELECT * FROM `sales` WHERE `client_id` = '$client_id'";
                                $query = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($query)) {
                                    $store_code = $row['store_code'];
                                    $store_sql = "SELECT * FROM `store` WHERE `store_id` = '$store_code'";
                                    $store_query = mysqli_query($conn, $store_sql);
                                    while($store_row = mysqli_fetch_array($store_query)) {
                                        
                            ?>
                                <tr>
                                    <td><?= $row['sale_id']; ?></td>
                                    <td><?= $store_code; ?></td>
                                    <td><?= mb_substr($store_row['store_name'], 0, 40, "UTF8"); ?></td>
                                    <td><?= $row['sale_date']; ?></td>
                                    <td><a href="follow.php" class="btn btn-custom"><i class="fas fa-tools"></a></td>
                                </tr>
                           
                            <?php }
                            
                        }?>
                            </tbody>
                            
                            
                        </table>
                    </div>

                    <div class="col-lg-12">
                        <a href="index.php" style="float: right;" class="btn btn-custom">ย้อนกลับ</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php include('includes/js.php'); ?>
</body>
</html>