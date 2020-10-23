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
                    <th>เลขที่การเคลมสินค้า</th>
                    <th>รหัสสินค้า</th>
                    <th>วันที่เคลม</th>
                    <th>รายละเอียดการเคลมสินค้า</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM `formation`";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?= $row['format_id']; ?></td>
                    <td><?= $row['store_id']; ?></td>
                    <td><?= $row['format_date']; ?></td>
                    <td><?= $row['format_detail']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <?php include('includes/js.php'); ?>

</body>
</html>