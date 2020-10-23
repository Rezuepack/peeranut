<?php 
    session_start();
    if(empty($_SESSION['client'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href = "login.php";</script>';
    }
?>