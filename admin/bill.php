<?php 
    include('../config/db.php');
    session_start();
    if(empty($_SESSION['admin'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href="../login.php"</script>';
    }

    if(isset($_GET['editEmployee'])) {
        $editEmployee_id = $_GET['editEmployee'];
        if(isset($_POST['add'])) {
            $edit = $_POST['edit'];
            $edit_sql = "UPDATE `bills` SET `employee_id` = '$edit' WHERE `bill_id` = '$editEmployee_id'";
            $edit_query = mysqli_query($conn, $edit_sql);
            if($edit_query) {
                echo '<script>alert("แก้ไขรหัสพนักงานสำเร็จ");window.location.href="bill.php";</script>';
            } else {
                echo '<script>alert("แก้ไขรหัสพนักงานล้มเหลว");window.location.href="bill.php";</script>';
            }
        }
       
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
                    <td><a href="#" data-toggle="modal" data-target="#editEmployee<?= $row['bill_id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                </tr>

                <!-- ฟอร์มที่แสดงในการแก้ไขพนักงาน -->
                <div class="modal fade" id="editEmployee<?= $row['bill_id']; ?>" tabindex="-1" aria-labellebdy="editEmployeeLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editEmployeeLabel">แก้ไขพนักงาน</h5>
                            </div>
                            <form action="bill.php?editEmployee=<?= $row['bill_id']; ?>" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>แก้ไขรหัสพนักงาน</label>
                                        <select name="edit" class="form-control">
                                            <option><?= $row['employee_id']; ?></option>
                                            <option disabled>----------------------------</option>
                                            <?php 
                                                $emp_sql = "SELECT * FROM `employees`";
                                                $emp_query = mysqli_query($conn, $emp_sql);
                                                while($emp_row = mysqli_fetch_array($emp_query)) {
                                            ?>
                                            <option><?= $emp_row['employee_id']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" name="add" class="btn btn-primary">แก้ไขพนักงาน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ฟอร์มที่แสดงในการเแก้ไขพนักงาน -->

                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <?php include('includes/js.php'); ?>

</body>
</html>