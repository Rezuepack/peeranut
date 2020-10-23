<?php 
    include('../config/db.php');
    session_start();
    if(empty($_SESSION['admin'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href="../login.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบหลังบ้าน | VAGAS X</title>
    <?php include('includes/css.php'); ?> 
</head>
<body>

    <?php include('includes/navbar.php'); ?>

    <div class="container mt-5">
        <table class="table text-center">
            <thead class="table-custom">
                <tr>
                    <th width="30">เลขที่สัญญาการขาย</th>
                    <th width="30">รหัสลูกค้า</th>
                    <th>ชื่อลูกค้า</th>
                    <th width="30">รหัสสินค้า</th>
                    <th>รายการสินค้าที่ซื้อ</th>
                    <th>เวลาสั่งซื้อ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                     $sql = "SELECT * FROM `sales` ORDER BY `sale_id` DESC";
                     $query = mysqli_query($conn, $sql);
                     while($row = mysqli_fetch_array($query)) {
                         $id_client = $row['client_id'];
                         $client_id_sql = "SELECT * FROM `client` WHERE `client_id` = '$id_client'";
                         $client_id_query = mysqli_query($conn, $client_id_sql);
                         while($client_result = mysqli_fetch_array($client_id_query)) {
                            $store_code = $row['store_code'];
                            $store_sql = "SELECT * FROM `store` WHERE `store_id` = '$store_code'";
                            $store_query = mysqli_query($conn, $store_sql);
                            while($store_row = mysqli_fetch_array($store_query)) {
                         
                         
                ?>
                <tr>
                    <td><?= $row['sale_id']; ?></td>
                    <td><?= $row['client_id']; ?></td>
                    <td><?= mb_substr($client_result['client_name'], 0, 20, "UTF8"); ?></td>
                    <td><?= $row['store_code']; ?></td>
                    <td><?= mb_substr($store_row['store_name'], 0, 20, "UTF8"); ?></td>
                    <td><?= $row['sale_date']; ?></td>
                </tr>
                <?php } }} ?>
            </tbody>
        </table>
    </div>
    
    <?php include('includes/js.php'); ?>

</body>
</html>