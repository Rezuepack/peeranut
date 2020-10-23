<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEERANUT</title>
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
                        <h3 class="text-center"><i class="fas fa-credit-card"></i> วิธีการสั่งซื้อ</h3>
                    </div>

                    <div class="col-lg-12">

                        <h4>1. สมัครสมาชิก</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod possimus autem soluta, facere cupiditate earum velit deleniti perspiciatis totam modi fuga ex nesciunt, cum pariatur? Cupiditate dolorem consectetur aspernatur reiciendis!</p>
                        <hr>

                        <h4>2. เข้าสู่ระบบ</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod possimus autem soluta, facere cupiditate earum velit deleniti perspiciatis totam modi fuga ex nesciunt, cum pariatur? Cupiditate dolorem consectetur aspernatur reiciendis!</p>
                        <hr>

                        <h4>3. เลือกสินค้าที่ต้องการ</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod possimus autem soluta, facere cupiditate earum velit deleniti perspiciatis totam modi fuga ex nesciunt, cum pariatur? Cupiditate dolorem consectetur aspernatur reiciendis!</p>
                        <hr>

                        <h4>4. กดสั่งซื้อ</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod possimus autem soluta, facere cupiditate earum velit deleniti perspiciatis totam modi fuga ex nesciunt, cum pariatur? Cupiditate dolorem consectetur aspernatur reiciendis!</p>
                        <hr>

                        <h4>5. โอนเงิน</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod possimus autem soluta, facere cupiditate earum velit deleniti perspiciatis totam modi fuga ex nesciunt, cum pariatur? Cupiditate dolorem consectetur aspernatur reiciendis!</p>
                        <hr>

                        <h4>6. กรอกที่อยู่ที่ต้องการจัดส่ง</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod possimus autem soluta, facere cupiditate earum velit deleniti perspiciatis totam modi fuga ex nesciunt, cum pariatur? Cupiditate dolorem consectetur aspernatur reiciendis!</p>
                        <hr>

                        <h4>7. สามารถตรวจสอบสถานะสินค้าของคุณได้</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod possimus autem soluta, facere cupiditate earum velit deleniti perspiciatis totam modi fuga ex nesciunt, cum pariatur? Cupiditate dolorem consectetur aspernatur reiciendis!</p>
                        <hr>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php include('includes/js.php'); ?>
</body>
</html>