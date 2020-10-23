<nav class="navbar navbar-expand-lg navbar-custom bg-custom">
        <div class="container">
            <a href="index.php" class="navbar-brand">VAGAS X</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResposive">
                <span style="color: white;">เมนู</span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResposive">

                <!-- <ul class="navbar-nav">
                    <form action="" method="">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-custom" style="margin-top: 14px; margin-left: 40px;" name="search"><i class="fas fa-search"></i> ค้นหา</button>
                        </div>
                        <input type="text" name="form_search" class="form-control" placeholder="ค้นหารายการสินค้า" style="width: 450px; margin-top: 14px;">
                    </form>
                </ul> -->

                <ul class="navbar-nav ml-auto">
                    <?php 
                        if(!empty($_SESSION['client']) || !empty($_SESSION['shopping_cart'])) {

                        
                    ?>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link nav-link-top-navbar"><i class="fas fa-user"></i> <?= $_SESSION['client'];  ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php" class="nav-link nav-link-top-navbar"><i class="fas fa-cart-arrow-down"></i> <span class="badge badge-primary"><?= count($_SESSION['shopping_cart']); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link nav-link-top-navbar"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                    </li>    
                    <?php } else { ?>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link nav-link-top-navbar"><i class="fas fa-user-plus"></i> สมัครสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link nav-link-top-navbar"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
                    </li>
                    <?php } ?>
                </ul>                
            </div>

        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-custom2 bg-custom2">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResposive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResposive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="product.php" class="nav-link nav-link-top-navbar"><i class="fas fa-shopping-cart"></i> สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a href="follow.php" class="nav-link nav-link-top-navbar"><i class="fas fa-luggage-cart"></i> ติตดามสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-top-navbar"><i class="fas fa-question-circle"></i> ขอความช่วยเหลือ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-top-navbar"><i class="fas fa-users"></i> ผู้จัดทำ</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>