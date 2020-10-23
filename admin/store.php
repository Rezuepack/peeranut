<?php 
    include_once('../config/db.php');
    session_start();
    if(empty($_SESSION['admin'])) {
        echo '<script>alert("กรุณาเข้าสู่ระบบ");window.location.href="../login.php"</script>';
    }
?>

<?php 
    if(isset($_GET['addtype'])) {
        if(isset($_POST['add'])) {
            $name = $_POST['name'];

            $insert_type_sql = "INSERT INTO `types` (type_name) VALUES('$name')";
            $insert_type_query = mysqli_query($conn, $insert_type_sql);
            if($insert_type_query) {
                echo '<script>alert("เพิ่มแบรนด์สินค้าสำเร็จ");window.location.href="store.php";</script>';
            } else {
                echo '<script>alert("เพิ่มแบรนด์สินค้าล้มเหลว กรุณาลองใหม่อีกครั้ง");window.location.href="store.php";</script>';
            }
        }
    }

    if(isset($_GET['addstore'])) {
        if(isset($_POST['add'])) {
            $name = $_POST['name'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, "../images/store/$image");

            $store_add_sql = "INSERT INTO `store` (store_name, store_type, store_image, store_price) VALUES ('$name', '$brand', '$image', '$price')";
            $store_add_query = mysqli_query($conn, $store_add_sql);
            if($store_add_query) {
                echo '<script>alert("เพิ่มสินค้าสำเร็จ");window.location.href="store.php";</script>';
            } else {
                echo '<script>alert("เพิ่มสินค้าล้มเหลว กรุณาลองใหม่อีกครั้ง");window.location.href="store.php";</script>';
            }

        }
    }

    if(isset($_GET['editstore'])) {
        $edit_store_id = $_GET['editstore'];
        if(isset($_POST['edit'])) {
            $name = $_POST['name'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, "../images/store/$image");

            $edit_store_sql = "UPDATE `store` SET `store_name` = '$name', `store_type` = '$brand', `store_price` = '$price', `store_image` = '$image' WHERE `store_id` = '$edit_store_id'";
            $edit_store_query = mysqli_query($conn, $edit_store_sql);
            if($edit_store_query) {
                echo '<script>alert("แก้ไขสินค้าสำเร็จ");window.location.href="store.php";</script>';
            } else {
                echo '<script>alert("แก้ไขสินค้าล้มเหลว");window.location.href="store.php";</script>';
            }

        }
    }

    if(isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        $remove_sql = "DELETE FROM `store` WHERE `store_id` = '$remove_id'";
        $remove_query = mysqli_query($conn, $remove_sql);
        if($remove_query) {
            echo '<script>alert("ลบสินค้าสำเร็จ");window.location.href="store.php";</script>';
        } else {
            echo '<script>alert("ลบสินค้าล้มเหลว");window.location.href="store.php";</script>';
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้า - ระบบหลังบ้าน | VAGAS X</title>
    <?php include('includes/css.php'); ?> 
</head>
<body>
    
    <?php include('includes/navbar.php'); ?>

    <div class="container mt-5">
        <!-- เพิ่มสินค้า -->
        <a href="#" class="btn-add" data-toggle="modal" data-target="#addStore">เพิ่มสินค้า</a>
        <a href="#" class="btn-add" data-toggle="modal" data-target="#addType">เพิ่มแบรนด์สินค้า</a>
        <!-- เพิ่มสินค้า -->

        <!-- ฟอร์มที่แสดงในการเพิ่มสินค้า -->
        <div class="modal fade" id="addStore" tabindex="-1" aria-labellebdy="addStoreLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStoreLabel">เพิ่มสินค้า</h5>
                    </div>
                    <form action="store.php?addstore" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ชื่อสินค้า</label>
                                <input type="text" class="form-control" name="name" placeholder="กรอกชื่อสินค้า" required>
                            </div>
                            <div class="form-group">
                                <label>แบรนด์สินค้า</label>
                                <select name="brand" class="form-control" placeholder="โปรดเลือกแบรนด์สินค้า" required>
                                    <option>โปรดเลือกแบรนด์สินค้า</option>
                                    <option disabled>-----------------------</option>
                                    <?php 
                                        $brand_sql = "SELECT * FROM `types`";
                                        $brand_query = mysqli_query($conn, $brand_sql);
                                        while($brand_result = mysqli_fetch_array($brand_query)) {
                                    ?>
                                    <option><?= $brand_result['type_name']; ?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ราคาสินค้า</label>
                                <input type="number" name="price" class="form-control" placeholder="กรอกราคาสินค้า">
                            </div>
                            <div class="form-group">
                                <label>รูปภาพสินค้า</label>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" name="add" class="btn btn-primary">เพิ่มสินค้า</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ฟอร์มที่แสดงในการเพิ่มสินค้า -->

        
        <!-- ฟอร์มที่แสดงในการเพิ่มแบรนด์สินค้า -->
        <div class="modal fade" id="addType" tabindex="-1" aria-labellebdy="addTypeLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTypeLabel">เพิ่มแบรนด์สินค้า</h5>
                    </div>
                    <form action="store.php?addtype" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ชื่อแบรนด์สินค้า</label>
                                <input type="text" class="form-control" name="name" placeholder="กรอกชื่อแบรนด์สินค้า" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" name="add" class="btn btn-primary">เพิ่มแบรนด์สินค้า</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ฟอร์มที่แสดงในการเพิ่มสินค้า -->

        <table class="table text-center">
            <thead class="table-custom">
                <tr>
                    <th>รหัสสินค้า</th>
                    <th>รูปภาพสินค้า</th>
                    <th>แบรนด์สินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคาสินค้า</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM `store`";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($query)) {
                        $id = $row['store_id'];
                        $name = $row['store_name'];
                        $type = $row['store_type'];
                        $image = $row['store_image'];
                        $price = $row['store_price'];
                    
                ?>
                <tr>
                    <td><?= $id; ?></td>
                    <td><img src="../images/store/<?= $image; ?>" width="120" height="120"></td>
                    <td><?= $type; ?></td>
                    <td><?= mb_substr($name, 0, 40, "UTF8"); ?></td>
                    <td><?= number_format($price, 2); ?></td>
                    <td><a href="#" data-toggle="modal" data-target="#editStore<?= $id; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                    <td><a href="#" data-toggle="modal" data-target="#removeStore<?= $id; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>

                <!-- ฟอร์มที่แสดงในการแก้ไขสินค้า -->
                <div class="modal fade" id="editStore<?= $id; ?>" tabindex="-1" aria-labellebdy="editStoreLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStoreLabel">แก้ไขสินค้า</h5>
                            </div>
                            <form action="store.php?editstore=<?= $id; ?>" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>ชื่อสินค้า</label>
                                        <input type="text" class="form-control" name="name" value="<?= $name; ?>" placeholder="กรอกชื่อสินค้า" required>
                                    </div>
                                    <div class="form-group">
                                        <label>แบรนด์สินค้า</label>
                                        <select name="brand" class="form-control" placeholder="โปรดเลือกแบรนด์สินค้า" required>
                                            <option><?= $type; ?></option>
                                            <option>โปรดเลือกแบรนด์สินค้า</option>
                                            <option disabled>-----------------------</option>
                                            <?php 
                                                $brand_sql = "SELECT * FROM `types`";
                                                $brand_query = mysqli_query($conn, $brand_sql);
                                                while($brand_result = mysqli_fetch_array($brand_query)) {
                                            ?>
                                            <option><?= $brand_result['type_name']; ?></option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>ราคาสินค้า</label>
                                        <input type="number" name="price" class="form-control" value="<?= $price; ?>" placeholder="กรอกราคาสินค้า">
                                    </div>
                                    <div class="form-group">
                                        <label>รูปภาพสินค้า</label>
                                        <input type="file" name="image" value="<?= $image; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" name="edit" class="btn btn-primary">แก้ไขสินค้า</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ฟอร์มที่แสดงในการแก้ไขสินค้า -->

                <!-- ฟอร์มที่แสดงในการลบสินค้า -->
                <div class="modal fade" id="removeStore<?= $id; ?>" tabindex="-1" aria-labellebdy="removeStoreLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="removeStoreLabel">ลบสินค้า</h5>
                            </div>
                            <form action="store.php?removestore" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <h5>คุณแน่ใจใช่แล้วหรือไม่? ที่ต้องการลบ <strong><?= $name; ?></strong>สินค้านี้</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                    <a href="store.php?remove=<?= $id; ?>" class="btn btn-primary">ลบสินค้า</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ฟอร์มที่แสดงในการลบสินค้า -->


                <?php } ?>

                

            </tbody>
        </table>
    </div>
    
    <?php include('includes/js.php'); ?>

</body>
</html>