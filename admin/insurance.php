<?php 
    include('../config/db.php');
    session_start();
    if(empty($_SESSION['admin'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href="../login.php"</script>';
    }

    if(isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        if(isset($_POST['update'])) {
            $name = $_POST['name'];
            $detail = $_POST['detail'];

            $ins_edit_sql = "UPDATE `insurance` SET `insurance_name` = '$name', `insurance_detail` = '$detail' WHERE `insurance_id` = '$edit_id'";
            $ins_edit_query = mysqli_query($conn, $ins_edit_sql);
            if($ins_edit_query) {
                echo '<script>alert("แก้ไขประกันสำเร็จ");window.location.href="insurance.php"</script>';
            } else {
                echo '<script>alert("แก้ไขประกันสำเร็จ");window.location.href="insurance.php"</script>';
            }

        }
    }

    if(isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        $ins_del_sql = "DELETE FROM `insurance` WHERE `insurance_id` = '$remove_id'";
        $ins_del_query = mysqli_query($conn, $ins_del_sql);
        if($ins_del_query) {
            echo '<script>alert("ลบประกันสำเร็จ");window.location.href="insurance.php"</script>';
        } else {
            echo '<script>alert("ลบประกันล้มเหลว");window.location.href="insurance.php"</script>';
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
                    <th>เลขที่ประกัน</th>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อประกัน</th>
                    <th>เวลาประกัน</th>
                    <th>รายละเอียดประกัน</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                     $sql = "SELECT * FROM `insurance`";
                     $query = mysqli_query($conn, $sql);
                     while($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?= $row['insurance_id']; ?></td>
                    <td><?= $row['store_id']; ?></td>
                    <td>
                        <?php if(empty($row['insurance_name'])) {
                            echo "ยังไม่มีชื่อประกัน";
                        } else {
                            echo $row['insurance_name'];
                        } ?>
                    </td>
                    <td><?= $row['insurance_date']; ?></td>
                    <td>
                        <?php if(empty($row['insurance_detail'])) {
                            echo "ยังไม่มีรายละเอียดประกัน";
                        } else {
                            echo $row['insurance_detail'];
                        } ?>
                    </td>
                    <td><a href="" class="btn btn-warning" data-toggle="modal" data-target="#editinsurance<?= $row['insurance_id']; ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a href="" class="btn btn-danger" data-toggle="modal" data-target="#removeinsurance<?= $row['insurance_id']; ?>"><i class="fas fa-trash"></i></a></td>
                </tr>

                <!-- ฟอร์มที่แสดงในการแก้ไขประกัน -->
                <div class="modal fade" id="editinsurance<?= $row['insurance_id']; ?>" tabindex="-1" aria-labellebdy="editinsuranceLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editinsuranceLabel">ข้อความแจ้งเตือน</h5>
                                </div>
                                <form action="insurance.php?edit=<?= $row['insurance_id']; ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>ชื่อประกัน</label>
                                            <input type="text" class="form-control" name="name" value="<?= $row['insurance_name']; ?>" placeholder="กรอกชื่อประกัน" required>
                                        </div>
                                        <div class="form-group">
                                            <label>รายละเอียดประกัน</label>
                                            <textarea name="detail" class="form-control" cols="10" rows="10" placeholder="กรอกรายละเอียดประกัน" required><?= $row['insurance_detail']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" class="btn btn-primary" name="update">แก้ไขประกัน</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- ฟอร์มที่แสดงในการแก้ไขประกัน -->

                <!-- ฟอร์มที่แสดงในการลบประกัน -->
                <div class="modal fade" id="removeinsurance<?= $row['insurance_id']; ?>" tabindex="-1" aria-labellebdy="removeinsuranceLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="removeinsuranceLabel">ข้อความแจ้งเตือน</h5>
                                </div>
                                    <div class="modal-body">
                                        <h5>แน่ใจใช่หรือไม่? ที่คุณต้องการลบประกัน <br><strong><?= $row['insurance_name']; ?></strong><br> ออกจากระบบ</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                        <a href="insurance.php?remove=<?= $row['insurance_id'] ?>" class="btn btn-primary">ลบประกัน</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                <!-- ฟอร์มที่แสดงในการลบประกัน -->
                        
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <?php include('includes/js.php'); ?>

</body>
</html>