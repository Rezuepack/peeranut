<div class="row">

<?php 
    include('config.php/db.php');
    $sql = "SELECT * FROM `store`";
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($query)) {

    
?>
<div class="col-lg-4">
                            <div class="box-cart text-center">
                                <img src="images/store/<?= $row['store_image']; ?>" width="100%" height="200">
                                <p><?= $row['store_name']; ?></p>
                                <p><?= number_format($row['store_price'], 2); ?></p>
                                <?= '<a href="cart.php?store_id='.$row['store_id'].'&action=add" class="btn btn-custom"><i class="fas fa-cart-plus"></i> หยิบใส่ตระกร้าสินค้า</a>' ?>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
