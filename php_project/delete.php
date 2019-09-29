<?php include "layout/header.php"?>
<?php include "model/category.php" ?>
<?php include "model/product.php" ?>

<?php include "config/database.php" ?>

<?php
$db = new Database();
$connection = $db->create_connection();
$product = new product($connection);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product->delete($id);

    $id = $_REQUEST[id];
    $product_del = $product->delete($id);


    if ($product_del) {
        echo "<script>alert('product successfully deleted')</script>";
        header("location: index.php");
    } else {
        echo "<script>alert('unable to delete product')</script>";
    }
}
?>