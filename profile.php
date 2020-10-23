<?php 
    include_once('config/db.php');
    session_start();
    // รับค่าจากฟอร์มล็อคอิน
    if(empty($_SESSION['client'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");</script>';
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
                        <h3 class="text-center">ข้อมูลส่วนตัว</h3>
                        <?php 
                            $sessions = $_SESSION['client_id'];
                            $sql = "SELECT * FROM `client` WHERE `client_id` = '$sessions'";
                            $query = mysqli_query($conn, $sql);
                            $profile = mysqli_fetch_array($query);
                        ?>
                        <div class="form-group">
                            <label>ชื่อจริง-นามสกุล</label>
                            <input type="text" class="form-control" value="<?= $profile['client_name']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>ที่อยู่</label>
                            <textarea class="form-control" cols="30" rows="10" disabled><?= $profile['client_address']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทร</label>
                            <input type="text" class="form-control" value="<?= $profile['client_phone']; ?>" disabled>
                        </div>
                        <a href="index.php" class="btn btn-custom" style="float: right;">กลับไปหน้าหลัก</a>
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