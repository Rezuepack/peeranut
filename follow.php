<?php 
    include('config/db.php');
    session_start();
    error_reporting(0);
    if(empty($_SESSION['client'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href = "login.php";</script>';
    }

    if(isset($_POST['formats'])) {

        $store_id = $_POST['store_id'];
        $detail = $_POST['detail'];
        $dttm = Date("Y-m-d G:i:s");

        $formation_sql = "INSERT INTO `formation` (store_id, format_date, format_detail) VALUES ('$store_id', '$dttm', '$detail')";
        $formation_query = mysqli_query($conn, $formation_sql);
        if($formation_query) {
            echo '<script>alert("ส่งเคลมสินค้าสำเร็จ");window.location.href="follow.php"</script>';
        } else {
            echo '<script>alert("ส่งเคลมสินค้าล้มเหลว");window.location.href="follow.php"</script>';
        }

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
                    <?php 
                        if(!empty($_GET['format'])) {
                            $format_id = $_GET['format'];
                            $format_sql = "SELECT * FROM `store` WHERE `store_id` = '$format_id'";
                            $format_query = mysqli_query($conn, $format_sql);
                            $format_result = mysqli_fetch_array($format_query);
                        
                    ?>  
                    <form action="follow.php" method="POST">
                        <input type="hidden" name="store_id" value="<?= $format_result['store_id']; ?>">
                        <div class="form-group">
                            <label>รายการสินค้า</label>
                            <input type="text" class="form-control" value="<?= $format_result['store_name']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>รายละเอียดในเกมเคลม</label>
                            <textarea name="detail" class="form-control" cols="10" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-custom" type="submit" name="formats">ส่งเคลมสินค้า</button>
                            <a href="follow.php" class="btn btn-custom">ยกเลิก</a>
                        </div>
                    </form>
                    <?php } ?>  
                    </div>

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
                                $sql = "SELECT * FROM `sales` WHERE `client_id` = '$client_id' ORDER BY `sale_id` DESC";
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
                                    <td><a href="follow.php?format=<?= $store_row['store_id']; ?>" class="btn btn-custom"><i class="fas fa-tools"></a></td>
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