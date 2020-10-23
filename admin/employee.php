<?php 
    include('../config/db.php');
    session_start();
    if(empty($_SESSION['admin'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href="../login.php"</script>';
    }

    if(isset($_POST['add'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $emp_sql = "INSERT INTO `employees` (employee_name, employee_address, employee_phone) VALUES ('$name', '$address', '$phone')";
        $emp_query = mysqli_query($conn, $emp_sql);
        if($emp_query) {
            echo '<script>alert("เพิ่มพนักงานสำเร็จ");window.location.href="employee.php";</script>';
        } else {
            echo '<script>alert("เพิ่มพนักงานล้มเหลว");window.location.href="employee.php";</script>';
        }

    }

    if(isset($_GET['editEmployee'])) {
        $emp_id = $_GET['editEmployee'];
        if(isset($_POST['update'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            $emp_edit_sql = "UPDATE `employees` SET `employee_name` = '$name', `employee_address` = '$address', `employee_phone` = '$phone' WHERE `employee_id` = '$emp_id'";
            $emp_edit_query = mysqli_query($conn, $emp_edit_sql);
            if($emp_edit_query) {
                echo '<script>alert("แก้ไขพนักงานสำเร็จ");window.location.href="employee.php";</script>';
            } else {
                echo '<script>alert("แก้ไขพนักงานล้มเหลว");window.location.href="employee.php";</script>';
            }

        }
    }

    if(isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        $remove_sql = "DELETE FROM `employees` WHERE `employee_id` = '$remove_id'";
        $remove_query = mysqli_query($conn, $remove_sql);
        if($remove_query) {
            echo '<script>alert("ลบพนักงานสำเร็จ");window.location.href="employee.php";</script>';
        } else {
            echo '<script>alert("ลบพนักงานล้มเหลว");window.location.href="employee.php";</script>';
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
    <a href="#" class="btn-add" data-toggle="modal" data-target="#addEmployee">เพิ่มพนักงาน</a>

    <!-- ฟอร์มที่แสดงในการเพิ่มพนักงาน -->
    <div class="modal fade" id="addEmployee" tabindex="-1" aria-labellebdy="addEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeLabel">เพิ่มพนักงาน</h5>
                </div>
                <form action="employee.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ชื่อพนักงาน</label>
                            <input type="text" class="form-control" name="name" placeholder="กรอกชื่อพนักงาน" required>
                        </div>
                        <div class="form-group">
                            <label>ที่อยู่พนักงาน</label>
                            <textarea name="address" class="form-control" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="number" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary" name="add">เพิ่มพนักงาน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
                <!-- ฟอร์มที่แสดงในการเพิ่มพนักงาน -->

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
                    <td><a href="" class="btn btn-warning" data-toggle="modal" data-target="#editEmployee<?= $row['employee_id']; ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a href="" class="btn btn-danger" data-toggle="modal" data-target="#removeEmployee<?= $row['employee_id']; ?>"><i class="fas fa-trash"></i></a></td>
                </tr>

                <!-- ฟอร์มที่แสดงในการแก้ไขพนักงาน -->
                    <div class="modal fade" id="editEmployee<?= $row['employee_id']; ?>" tabindex="-1" aria-labellebdy="editEmployeeLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editEmployeeLabel">แก้ไขพนักงาน</h5>
                                </div>
                                <form action="employee.php?editEmployee=<?= $row['employee_id']; ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>ชื่อพนักงาน</label>
                                            <input type="text" class="form-control" name="name" value="<?= $row['employee_name']; ?>" placeholder="กรอกชื่อพนักงาน" required>
                                        </div>
                                        <div class="form-group">
                                            <label>ที่อยู่พนักงาน</label>
                                            <textarea name="address" class="form-control" cols="30" rows="10" required><?= $row['employee_address']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input type="number" name="phone" class="form-control" value="<?= $row['employee_phone']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" class="btn btn-primary" name="update">แก้ไขพนักงาน</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- ฟอร์มที่แสดงในการแก้ไขพนักงาน -->

                <!-- ฟอร์มที่แสดงในการลบพนักงาน -->
                <div class="modal fade" id="removeEmployee<?= $row['employee_id']; ?>" tabindex="-1" aria-labellebdy="removeEmployeeLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="removeEmployeeLabel">ข้อความแจ้งเตือน</h5>
                                </div>
                                    <div class="modal-body">
                                        <h5>แน่ใจใช่หรือไม่? ที่คุณต้องการลบพนักงาน <br><strong><?= $row['employee_name']; ?></strong><br> ออกจากระบบ</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                        <a href="employee.php?remove=<?= $row['employee_id'] ?>" class="btn btn-primary">ลบพนักงาน</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                <!-- ฟอร์มที่แสดงในการลบพนักงาน -->

                <?php } ?>

            </tbody>
        </table>
    </div>
    
    <?php include('includes/js.php'); ?>

</body>
</html>