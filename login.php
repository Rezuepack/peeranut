<?php 
    include_once('config/db.php');
    session_start();
    // รับค่าจากฟอร์มล็อคอิน
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `client` WHERE `client_username` = '$username' AND `client_password` = '$password'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            $_SESSION['client'] = $row['client_name'];
            $_SESSION['client_id'] = $row['client_id'];
            echo '<script>window.location.href = "index.php";</script>';
        }else if($username == "admin" && $password == "1234") {
            $_SESSION['admin'] = "ADMIN VEGAS X";
            echo '<script>alert("เข้าสู่ระบบสำเร็จ ตอนนี้คุณอยู่ในสถานะแอดมิน");window.location.href = "admin";</script>';
        } else {
            echo '<script>alert("ชื่อผู้ใช้หรือรหัสผ่านของคุณผิดกรุณาลองใหม่อีกครั้ง");</script>';
        }

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
                        <!-- ฟอร์มเข้าสู่ระบบ -->
                        <h3 class="text-center">ลงชื่อเข้าใช้งาน</h3>
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label>ชื่อผู้ใช้</label>
                                <input type="text" name="username" class="form-control" placeholder="กรุณาป้อนชื่อผู้ใช้งาน" required>
                            </div>
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                <input type="password" name="password" class="form-control" placeholder="กรุณาป้อนชื่อรหัสผ่าน" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="btn btn-custom btn-block btn-lg"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                            </div>
                            <a href="register.php" class="text-link">&nbsp;&nbsp;&nbsp;คุณยังไม่มีรหัสผ่านใช่หรือไม่ ?</a>
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