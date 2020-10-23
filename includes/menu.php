<div class="box-menu">
    <a href="product.php">สินค้าทั้งหมด</a>
</div>
<?php 
    include('config/db.php');
    $menu_sql = "SELECT * FROM `types`";
    $menu_query = mysqli_query($conn, $menu_sql);
    while($menu_row = mysqli_fetch_array($menu_query)) {
        $name = $menu_row['type_name'];
?>
<div class="box-menu">
    <a href="product.php?type=<?= $name; ?>">Notebook <?= $name; ?></a>
</div>
<?php } ?>