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
    <a href="#" class="btn-add" data-toggle="modal" data-target="#addStore">เพิ่มพนักงาน</a>
        <table class="table text-center">
            <thead class="table-custom">
                <tr>
                    <th>รหัสพนักงาน</th>
                    <th>ชื่อพนักงาน</th>
                    <th>ที่อยู่พนักงาน</th>
                    <th>เบอร์โทรพนักงาน</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM `employees`";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($query)) {

                    
                ?>
                <tr>
                    <td><?= $row['employee_id']; ?></td>
                    <td><?= $row['employee_name']; ?></td>
                    <td><?= $row['employee_address']; ?></td>
                    <td><?= $row['employee_phone']; ?></td>
                    <td><a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                    <td><a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    
    <?php include('includes/js.php'); ?>

</body>
</html>