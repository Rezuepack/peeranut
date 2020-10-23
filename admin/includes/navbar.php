<nav class="navbar navbar-expand-lg navbar-custom bg-custom">
        <div class="container">
            <a href="index.php" class="navbar-brand">หลังบ้านของ VAGAS X</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResposive">
                <span style="color: white;">เมนู</span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResposive">
                <ul class="navbar-nav ml-auto">
                    <?php 
                        if(!empty($_SESSION['admin'])) {

                        
                    ?>

                    <li class="nav-item">
                        <a href="index.php" class="nav-link nav-link-top-navbar"><i class="fas fa-user"></i> <?= $_SESSION['admin']; ?></a>
                    </li>

                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link nav-link-top-navbar"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
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
                        <a href="store.php" class="nav-link nav-link-top-navbar"><i class="fas fa-shopping-cart"></i> สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a href="list.php" class="nav-link nav-link-top-navbar"><i class="fas fa-credit-card"></i> รายการสั่งซื้อ</a>
                    </li>
                    <li class="nav-item">
                        <a href="bill.php" class="nav-link nav-link-top-navbar"><i class="fas fa-question-circle"></i> บิลสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a href="employee.php" class="nav-link nav-link-top-navbar"><i class="fas fa-user-shield"></i> พนักงาน</a>
                    </li>
                    <li class="nav-item">
                        <a href="insurance.php" class="nav-link nav-link-top-navbar"><i class="fas fa-comments"></i> ประกันสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a href="formation.php" class="nav-link nav-link-top-navbar"><i class="fas fa-tools"></i> เคลมสินค้า</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>