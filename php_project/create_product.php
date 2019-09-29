<?php include "layout/header.php" ?>
<?php include "model/category.php" ?>
<?php include "model/product.php" ?>

<?php include "config/database.php" ?>
<?php
$db =new Database();
$connection =$db->create_connection();

//$product =new product($connection);
$category =new category($connection);

$categories= $category->get_categories();
?>

    <div class="container">

        <form  action="<?php $_SERVER ["PHP_SELF"]?>" method ="POST">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="product name">

            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price"  placeholder=" product price">
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="dropdown mb-4">
                <div class="from-group">
                    <div>
                        Categories
                <select class=from-control" name="category_id" >
                    <?php
                    foreach($categories as $category)
                    {
                        echo "<option value=$category[id]>$category[name]</option>";
                    }

                    ?>
                </select>

                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>

<?php
if(isset($_POST["submit"]))
{
    $product=new product($connection);
    $product->name=$_POST["product_name"];
    $product->price=$_POST["price"];
    $product->description=$_POST["description"];
    $product->category_id=$_POST["category_id"];


    if($product->create())
    {
        echo"<div class='alert alert-success'>product was created</div>";
        header ("location: index.php");
    }
    else{
        echo"<div class='alert alert-success'>unable to create product</div>";
    }


}


?>


<?php include "layout/footer.php" ?>