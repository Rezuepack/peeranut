<?php 
    include_once('config/db.php');
    session_start();

    if(!empty($_SESSION['client']) || !empty($_SESSION['admin'])) {
        header("Location: index.php");
    }

    // รับค่าจากฟอร์มสมัครสมาชิก
    if(isset($_POST['register'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $username_check_sql = "SELECT * FROM `client` WHERE `client_username` = '$username' LIMIT 1";
        $username_check_query = mysqli_query($conn, $username_check_sql);
        $username_check = mysqli_fetch_array($username_check_query);

        if($username_check['client_username'] === $username_check_query) {
            echo "<script>alert('ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว');</script>";
        } else {
            // เพิ่มข้อมูลลงฐานข้อมูล
            $sql = "INSERT INTO `client` (client_name, client_username, client_address, client_phone, client_password) VALUES ('$name', '$username', '$address', '$phone', '$password')";
            // ทำการเพิ่มลงฐานข้อมูล
            $query = mysqli_query($conn, $sql);
            if($query) {
                // ALERT ข้อความแจ้งเตือน
                echo '<script>alert("สมัครสมาชิกสำเร็จแล้ว");window.location.href = "login.php"</script>';
            } else {
                // ALERT ข้อความแจ้งเตือน
                echo '<script>alert("สมัครสมาชิกล้มเหลว กรุณาติดต่อเจ้าของเว็บไซต์");</script>';
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก | VAGAS X</title>
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
                        <!-- ฟอร์มเข้าสู่ระบบ -->
                        <h3 class="text-center">ลงทะเบียเพื่อเข้าใช้งาน</h3>
                        <form action="register.php" method="POST">
                            <div class="form-group">
                                <label>ชื่อจริง-นามสกุล</label>
                                <input type="text" name="name" class="form-control" placeholder="กรุณาป้อนชื่อจริง-นามสกุล" required>
                            </div>
                            <div class="form-group">
                                <label>ชื่อผู้ใช้</label>
                                <input type="text" name="username" class="form-control" placeholder="กรุณาป้อนชื่อผู้ใช้งาน" required>
                            </div>
                            <div class="form-group">
                                <label>ที่อยู่</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="10" placeholder="กรุณาป้อนที่อยู่ของคุณ" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="number" name="phone" class="form-control" placeholder="กรุณาป้อนเบอร์โทรศัพท์ 10 หลัก" required>
                            </div>
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                <input type="password" name="password" class="form-control" placeholder="กรุณาป้อนรหัสผ่าน" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register" class="btn btn-custom btn-block btn-lg"><i class="fas fa-user-plus"></i> สมัครสมาชิก</button>
                            </div>
                            <a href="login.php" class="text-link">คุณมีรหัสผ่านแล้วใช่หรือไม่ ?</a>
                        </form>
                        <!-- ฟอร์มเข้าสู่ระบบ -->
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