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
                    <th>เลขที่บิล</th>
                    <th>รหัสลูกค้า</th>
                    <th>เลขที่สัญญาการขาย</th>
                    <th>รหัสพนักงาน</th>
                    <th>รายการสินค้าที่ซื้อ</th>
                    <th>แก้ไขรหัสพนักงาน</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                     $sql = "SELECT * FROM `bills`";
                     $query = mysqli_query($conn, $sql);
                     while($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?= $row['bill_id']; ?></td>
                    <td><?= $row['cilent_id']; ?></td>
                    <td><?= $row['sale_id']; ?></td>
                    <td><?= $row['employee_id']; ?></td>
                    <td><?= $row['store_name']; ?></td>
                    <td><a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <?php include('includes/js.php'); ?>

</body>
</html>