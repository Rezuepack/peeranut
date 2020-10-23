<?php
    // การตั้งค่าของฐานข้อมูล
    $server = 'localhost';
    $user = "root";
    $pass = "";
    $db = "vagasx";

    // ติดต่อกับฐานข้อมูล
    $conn = new mysqli($server, $user, $pass, $db);
    
    if(!$conn) {
        echo 'โปรดติดต่อคุณ Peeranut';
    }

    // ให้รองรับทุกภาษา โดยเฉพาะภาษาไทย
    mysqli_set_charset($conn, "utf8");
    // ตั้งเวลาเป็นโซนของไทย
    date_default_timezone_set("Asia/Bangkok");

?>